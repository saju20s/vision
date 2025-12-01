<?php

namespace App\Livewire\Backend\Hospital;

use App\Models\Bed;
use App\Models\Patient;
use App\Models\Admission;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class HospitalLevel extends Component
{
    public $selectedFloor = null;
    public $confirmedFloor = null;
    public $bedCount = 0;
    public $showAdmissionForm = false;
    public $selectedBed = null;
    public $selectedPatientId = null;
    public $patients = [];
    public $billValues = [];
    public $patientSearch = '';
    public $beds = [];
    public $selectedAdmissionId;
    public $selectedPatientName;
    public $selectedRoomNo;
    public $showDischargeModal = false;
    public $totalAdmissionsAllFloors = 0;
    public $totalAdmissionsOnFloor = 0;


    public function updateBillId($admissionId)
    {
        $admission = Admission::find($admissionId);
        $billId = $this->billValues[$admissionId] ?? null;

        if (!$billId) {
            $this->dispatch('toastr:error', message: 'Bill ID is empty.');
            return;
        }

        $admission->bill_id = [$billId];
        $admission->save();

        $this->dispatch('toastr:success', message: 'Bill ID updated successfully!');
        $this->loadBeds();
    }


    public function dischargePatient($admissionId)
    {
        $this->selectedAdmissionId = $admissionId;
        $admission = Admission::find($admissionId);

        if (!$admission) {
            $this->dispatch('toastr:error', message: 'Admission not found.');
            return;
        }

        $this->selectedPatientName = $admission->patient->name;
        $this->selectedRoomNo = $admission->bed->room_no ?? 'N/A';
        $this->showDischargeModal = true;
    }


    public function confirmDischarge()
    {
        DB::transaction(function () {
            $admission = Admission::find($this->selectedAdmissionId);

            if (!$admission) {
                $this->dispatch('toastr:error', message: 'Admission not found.');
                return;
            }

            $admission->update([
                'status' => 'discharged',
                'discharge_date' => now(),
                'prepared_by' => auth()->user()->id,
            ]);

            if ($admission->bed) {
                $admission->bed->update(['is_occupied' => 0]);
            }
        });

        $this->dispatch('toastr:success', message: 'Patient discharged successfully!');
        $this->loadBeds();
        $this->resetModalState();
    }

    public function resetModalState()
    {
        $this->showDischargeModal = false;
        $this->selectedAdmissionId = null;
        $this->selectedPatientName = null;
        $this->selectedRoomNo = null;
    }


    public function updatedSelectedFloor($value)
    {
        $this->bedCount = $value ? Bed::where('floor_no', $value)->count() : 0;
    }

    public function showBeds()
    {
        $this->confirmedFloor = $this->selectedFloor;
        $this->loadBeds();
    }


    public function loadBeds()
    {
        if ($this->confirmedFloor) {
            $this->beds = Bed::with(['admission.patient'])
                ->where('floor_no', $this->confirmedFloor)
                ->orderBy('bed_no')
                ->get();

            $this->totalAdmissionsOnFloor = $this->beds->filter(fn($bed) => $bed->admission)->count();
        }

        $this->totalAdmissionsAllFloors = Admission::where('status', 'admitted')->count();

        foreach ($this->beds as $bed) {
            if ($bed->admission && $bed->admission->bill_id) {
                $this->billValues[$bed->admission->id] = $bed->admission->bill_id[0] ?? '';
            }
        }
    }



    public function openAdmissionForm($bedId)
    {
        $this->selectedBed = Bed::find($bedId);

        if ($this->selectedBed->is_occupied) {
            $this->dispatch('toastr:error', message: 'This bed is already occupied.');
            return;
        }

        $this->selectedPatientId = null;
        $this->showAdmissionForm = true;
    }

    /**
     * Generate unique admission_id like A25-0000001
     */
    private function generateAdmissionId()
    {
        $yearSuffix = now()->format('y'); // last two digits of year
        $prefix = "A{$yearSuffix}-";

        // find last admission of current year
        $lastAdmission = Admission::whereYear('created_at', now()->year)
            ->where('admission_id', 'like', "{$prefix}%")
            ->orderByDesc('id')
            ->first();

        $lastNumber = 0;

        if ($lastAdmission && preg_match('/A\d{2}-(\d+)/', $lastAdmission->admission_id, $matches)) {
            $lastNumber = (int)$matches[1];
        }

        $nextNumber = str_pad($lastNumber + 1, 7, '0', STR_PAD_LEFT);
        return "{$prefix}{$nextNumber}";
    }

    public function admitPatient()
    {
        $this->validate([
            'selectedPatientId' => 'required|exists:patients,id',
        ]);

        $existingAdmission = Admission::where('patient_id', $this->selectedPatientId)
            ->where('status', 'admitted')
            ->first();

        if ($existingAdmission) {
            $this->dispatch('toastr:error', message: 'This patient is already admitted!');
            return;
        }

        DB::transaction(function () {
            $admissionId = $this->generateAdmissionId();

            Admission::create([
                'admission_id' => $admissionId,
                'patient_id'   => $this->selectedPatientId,
                'bed_id'       => $this->selectedBed->id,
                'admit_date'   => now(),
                'status'       => 'admitted',
            ]);

            $this->selectedBed->update(['is_occupied' => 1]);
        });

        $this->loadBeds();
        $this->showAdmissionForm = false;
        $this->dispatch('toastr:success', message: 'Patient admitted successfully!');
    }


    public function render()
    {
        $this->patients = Patient::where(function ($query) {
            $query->where('patient_id', 'like', '%' . $this->patientSearch . '%')
                ->orWhere('phone', 'like', '%' . $this->patientSearch . '%');
        })
            ->orderBy('name')
            ->get();

        return view('livewire.backend.hospital.hospital-level', [
            'floors' => Bed::select('floor_no')->distinct()->orderBy('floor_no')->get(),
            'beds'   => $this->beds,
            'patients' => $this->patients,
        ])->layout('backend.template.body');
    }
}
