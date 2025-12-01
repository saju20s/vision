<?php

namespace App\Livewire\Backend\Doctors;

use App\Models\Bill;
use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithPagination;

class Doctors extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';
    public $statusFilter = true;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {

        $doctor = Doctor::findOrFail($this->deleteId);


        $doctor->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Doctor deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->is_active = !$doctor->is_active;
        $doctor->save();

        $status = $doctor->is_active ? 'activated' : 'deactivated';
        $this->dispatch('toastr:success', message: "Doctor $status successfully.");
    }

    public function setStatusFilter($status)
    {
        $this->statusFilter = $status; // true = Active, false = Inactive
        $this->resetPage();
    }

    public function formatCount($count)
    {
        if ($count >= 1000000) {
            return number_format($count / 1000000, 1) . 'M';
        } elseif ($count >= 1000) {
            return number_format($count / 1000, 1) . 'K';
        } else {
            return $count;
        }
    }




    public function render()
    {
        $doctors = Doctor::query()
            ->when($this->search, fn($q) => $q->where(function ($q2) {
                $q2->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            }))
            ->where('is_active', $this->statusFilter)
            ->latest()
            ->paginate(10);

        // Calculate totals for each doctor
        foreach ($doctors as $doctor) {
            $bills = Bill::where('doctor_id', $doctor->id)->get();
            $doctor->total_patients = $bills->unique('patient_id')->count();
            $doctor->total_amount = $bills->sum('total_amount');
            $doctor->total_commission = $bills->sum('doctor_commision');
        }

        $activeCount = $this->formatCount(Doctor::where('is_active', true)->count());
        $inactiveCount = $this->formatCount(Doctor::where('is_active', false)->count());

        return view('livewire.backend.doctors.doctors', [
            'datas' => $doctors,
            'activeCount' => $activeCount,
            'inactiveCount' => $inactiveCount,
        ])->layout('backend.template.body');
    }
}
