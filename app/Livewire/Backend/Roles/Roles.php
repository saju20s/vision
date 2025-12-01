<?php

namespace App\Livewire\Backend\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class Roles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';

    public function mount()
    {
        if (request()->query('success')) {
            $this->dispatch('toastr:success', message: 'Role updated successfully.');
        }
    }


    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        try {
            $permission = Role::findOrFail($this->deleteId);

            if ($permission->name === 'Master Admin') {
                $this->dispatch('toastr:error', message: 'The Master Admin role cannot be deleted.');
            } else {
                $permission->delete();
                $this->dispatch('toastr:success', message: 'Role deleted successfully.');
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }

        $this->deleteId = null;
    }

    public function render()
    {
        $datas = Role::query()
            ->where('name', '!=', 'Master Admin')
            ->when(
                $this->search,
                fn($query) =>
                $query->where('name', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(10);
        return view('livewire.backend.roles.roles', compact('datas'))->layout('backend.template.body');
    }
}
