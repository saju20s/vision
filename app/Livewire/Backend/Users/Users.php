<?php

namespace App\Livewire\Backend\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';
    public $filter = 'all';
    public $allActive = false;

    public function mount()
    {
        $this->allActive = User::where('is_active', 0)->count() === 0;
    }

    public function toggleAllActive()
    {
        try {
            $inactiveCount = User::where('is_active', 0)->count();
            $newStatus = $inactiveCount > 0 ? 1 : 0;
            User::query()->update(['is_active' => $newStatus]);
            $this->allActive = $newStatus == 1;
            $status = $newStatus ? 'activated' : 'deactivated';
            $this->dispatch('toastr:success', message: "All users have been {$status}.");
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: "Error: " . $e->getMessage());
        }
    }


    public function setFilter($type)
    {
        $this->filter = $type;
        $this->resetPage();
    }

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
        try {
            $user = User::findOrFail($this->deleteId);

            // Prevent deletion of demo/superadmin account
            if ($user->email === 'shariful971@gmail.com') {
                $this->dispatch('toastr:error', message: 'This Master Admin account cannot be deleted.');
            } else {
                $user->delete();
                $this->deleteId = null;

                $this->dispatch('toastr:success', message: 'User deleted successfully.');
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }


    public function render()
    {
        $roles = Role::withCount('users')
            ->where('name', '!=', 'Master Admin')
            ->get();

        $users = User::query()
            ->where('email', '!=', 'shariful971@gmail.com')
            ->when($this->search, function ($query) {
                $search = '%' . $this->search . '%';
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', $search)
                        ->orWhere('email', 'like', $search);
                });
            })
            ->when($this->filter !== 'all', function ($query) {
                $filter = $this->filter;

                if ($filter === 'Master Admin') return;

                $query->whereHas('roles', function ($q) use ($filter) {
                    $q->where('name', $filter);
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.backend.users.users', [
            'datas' => $users,
            'roles' => $roles,
            'all_users' => User::where('email', '!=', 'shariful971@gmail.com')->count(),
        ])->layout('backend.template.body');
    }
}
