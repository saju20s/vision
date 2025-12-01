<?php

namespace App\Livewire\Backend\Patients;

use App\Models\Patient;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Patients extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';

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

        $patient = Patient::findOrFail($this->deleteId);


        $patient->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Patient deleted successfully.');
    }


    public function render()
    {
        $patients = Patient::query()
            ->where('type', 'patient')
            ->when(
                $this->search,
                fn($query) => $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                })
            )
            ->latest()
            ->paginate(50);
        $setting = Setting::find(1);

        return view('livewire.backend.patients.patients', [
            'datas' => $patients,
            'setting' => $setting,
        ])->layout('backend.template.body');
    }
}
