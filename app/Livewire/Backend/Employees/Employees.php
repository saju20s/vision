<?php

namespace App\Livewire\Backend\Employees;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class Employees extends Component
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

        $employee = Patient::findOrFail($this->deleteId);


        $employee->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Employee deleted successfully.');
    }

    public function render()
    {
        $employees = Patient::query()
            ->where('type', 'employee')
            ->when(
                $this->search,
                fn($query) => $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                })
            )
            ->withSum('bills', 'total_amount')   // মোট এমাউন্ট
            ->withSum('bills', 'discount')       // মোট ডিসকাউন্ট
            ->withCount('bills')                 // মোট টেস্ট সংখ্যা
            ->latest()
            ->paginate(10);

        return view('livewire.backend.employees.employees', [
            'datas' => $employees,
        ])->layout('backend.template.body');
    }
}
