<?php

namespace App\Livewire\Backend\Hospital;

use App\Models\Bed;
use App\Models\Doctor;
use Livewire\Component;
use App\Models\Admission;
use App\Models\Marketing;
use App\Models\Otconsent;

class PtOtConsent extends Component
{
    public $form = [];
    public $admissionId;
    public $floors = [];

    public $surgeon_id;
    public $surgeonSearch = '';
    public $surgeonResults = [];

    public $admittedDoctorSearch = '';
    public $admittedDoctorResults = [];

    public $anesthesiologistSearch = '';
    public $anesthesiologistResults = [];

    public $referenceBySearch = '';
    public $referenceByResults = [];

    // Search Marketing
    public function searchReferenceBy()
    {
        $search = trim($this->referenceBySearch);
        if (empty($search)) {
            $this->referenceByResults = Marketing::orderBy('name')->limit(10)->get();
            return;
        }
        $this->referenceByResults = Marketing::where('name', 'like', '%' . $search . '%')
            ->orderBy('name')->limit(20)->get();
    }

    // Select Marketing
    public function selectReferenceBy($id)
    {
        $marketing = Marketing::find($id);
        if ($marketing) {
            $this->form['reference_by'] = $marketing->name . ' (ID: ' . $marketing->id . ')';
            $this->referenceByResults = [];
        }
    }


    public function searchAnesthesiologist()
    {
        $search = trim($this->anesthesiologistSearch);
        if (empty($search)) {
            $this->anesthesiologistResults = Doctor::where('is_active', true)->orderBy('name')->limit(10)->get();
            return;
        }
        $this->anesthesiologistResults = Doctor::where('is_active', true)
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('name')
            ->limit(20)
            ->get();
    }

    public function selectAnesthesiologist($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            $this->form['anesthesiologist'] = $doctor->name . ' (ID: ' . $doctor->id . ')';
            $this->anesthesiologistResults = [];
        }
    }


    // Search admitted_under_doctor
    public function searchAdmittedDoctor()
    {
        $search = trim($this->admittedDoctorSearch);
        if (empty($search)) {
            $this->admittedDoctorResults = Doctor::where('is_active', true)->orderBy('name')->limit(10)->get();
            return;
        }
        $this->admittedDoctorResults = Doctor::where('is_active', true)
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('name')
            ->limit(20)
            ->get();
    }

    // Select admitted_under_doctor
    public function selectAdmittedDoctor($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            $this->form['admitted_under_doctor'] = $doctor->name . ' (ID: ' . $doctor->id . ')';
            $this->admittedDoctorResults = [];
        }
    }


    public function searchSurgeon()
    {
        $search = trim($this->surgeonSearch);

        if (empty($search)) {
            $this->surgeonResults = Doctor::where('is_active', true)
                ->orderBy('name')
                ->limit(10)
                ->get();
            return;
        }

        $this->surgeonResults = Doctor::where('is_active', true)
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('name')
            ->limit(20)
            ->get();
    }

    public function selectSurgeon($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            $this->surgeon_id = $doctor->id;
            $this->form['surgeon'] = $doctor->name . ' (ID: ' . $doctor->id . ')';
            $this->surgeonResults = [];
        }
    }



    public function mount($id)
    {
        $this->admissionId = $id;

        $admission = Admission::with('patient', 'bed')->find($id);

        $todayDate = now()->format('Y-m-d'); // Only date for date input
        $todayDateTime = now()->format('Y-m-d\TH:i'); // For datetime-local input

        if ($admission) {
            $this->form = [
                'admission_id' => $admission->admission_id ?? '',
                'ot_date' => $todayDate, // today date by default
                'patient_name' => $admission->patient->name ?? '',
                'age' => $admission->patient->age ?? '',
                'gender' => $admission->patient->gender ?? '',
                'phone' => $admission->patient->phone ?? '',
                'address' => $admission->patient->address ?? '',
                'religion' => $admission->patient->religion ?? '',
                'marrital_status' => $admission->patient->marrital_status ?? '',
                'surgeon' => '',
                'admitted_under_doctor' => '',
                'assistant' => '',
                'assistant_two' => '',
                'assistant_three' => '',
                'anesthesiologist' => '',
                'anesthesia_type' => '',
                'operation_category' => '',
                'operation_name' => '',
                'operation_diagnosis' => '',
                'guardian_name' => $admission->patient->guardian_name ?? '',
                'patient_relation' => '',
                'guardian_address' => $admission->patient->guardian_address ?? '',
                'bed_category' => $admission->bed->bed_category ?? '',
                'floor_no' => $admission->bed->floor_no ?? '',
                'bed_no' => $admission->bed->bed_no ?? '',
                'room_no' => $admission->bed->room_no ?? '',
                'bed_type' => $admission->bed->bed_type ?? '',
                'charge' => 0,
                'reference_by' => '',
                'indication' => '',
                'blood_transfusion' => '',
                'delivery_date_time' => $todayDateTime,
                'baby_gender' => '',
                'baby_weight' => '',
                'findings' => '',
                'other_notes' => '',
            ];

            if ($admission->ot_consent) {
                $old = json_decode($admission->ot_consent, true);
                $this->form = array_merge($this->form, $old);
            }
        }
    }




    public function store()
    {
        try {
            Otconsent::updateOrCreate(
                ['admission_id' => $this->admissionId],
                $this->form
            );

            $this->dispatch('toastr:success', message: 'OT Consent saved successfully.');
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.hospital.pt-ot-consent')
            ->layout('backend.template.body');
    }
}
