<?php

namespace App\Livewire\Backend\Doctors;

use App\Models\Bill;
use App\Models\Doctor;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class DoctorCommisionList extends Component
{
    use WithPagination;

    public $doctor_id;
    public $search = '';
    public $from_date;
    public $to_date;
    public $perPage = 20;
    public $doctor;
    public $total_commission = 0;
    public $doctorResults = [];
    public $showDoctorList = false;

    public function mount($doctor_id = null)
    {
        $this->from_date = date('Y-m-d');
        $this->to_date = date('Y-m-d');
        $this->doctor_id = $doctor_id;
        if ($doctor_id) {
            $this->doctor = Doctor::find($doctor_id);
        }
    }

    public function searchDoctor()
    {
        if (strlen($this->search) < 1) {
            $this->doctorResults = Doctor::orderBy('name')->limit(20)->get();
        } else {
            $this->doctorResults = Doctor::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('name')
                ->limit(20)
                ->get();
        }

        $this->showDoctorList = true;
    }

    public function selectDoctor($doctorId)
    {
        $this->doctor_id = $doctorId;
        $this->doctor = Doctor::find($doctorId);
        $this->search = $this->doctor->name ?? '';
        $this->showDoctorList = false;
    }

    public function loadMore()
    {
        $this->perPage += 20;
    }

    public function filterByDate()
    {
        $this->resetPage();
        $this->dispatch('$refresh');
    }


    public function getBillsQuery()
    {
        $query = Bill::query()
            ->whereNotNull('doctor_commision')
            ->orderBy('created_at', 'desc')
            ->with('doctor', 'patient');

        if (!empty($this->doctor_id)) {
            $query->where('doctor_id', $this->doctor_id);
        }

        if ($this->from_date && $this->to_date) {
            $from = date('Y-m-d 00:00:00', strtotime($this->from_date));
            $to = date('Y-m-d 23:59:59', strtotime($this->to_date));
            $query->whereBetween('created_at', [$from, $to]);
        }

        return $query;
    }

    public function render()
    {
        $bills = $this->getBillsQuery()->paginate($this->perPage);
        $this->total_commission = $this->getBillsQuery()->sum('doctor_commision');
        $setting = Setting::find(1);

        return view('livewire.backend.doctors.doctor-commision-list', [
            'bills' => $bills,
            'setting' => $setting,
        ])->layout('backend.template.body');
    }
}
