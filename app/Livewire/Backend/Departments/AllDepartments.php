<?php

namespace App\Livewire\Backend\Departments;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class AllDepartments extends Component
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

        $departmentg = Department::findOrFail($this->deleteId);

        $departmentg->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Deleted successfully.');
    }


    public function render()
    {
        $departments = Department::query()
            ->when(
                $this->search,
                fn($query) => $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(10);

        return view('livewire.backend.departments.all-departments', [
            'datas' => $departments,
        ])->layout('backend.template.body');
    }
}
