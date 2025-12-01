<?php

namespace App\Livewire\Backend\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;

class EditRole extends Component
{
    public $roleId;
    public $role_name;
    public $selectedPermissions = [];
    public $groupedPermissions = [];

    public $customGroupOrder = [
        'dashboard',
        'doctors',
        'patients',
        'bill',
        'bill_history',
        'invoice',
        'report',
        'reports_delivery',
        'investigations',
        'investigation_form',
        'expenses',
        'expense_category',
        'marketings',
        'commisions',
        'pages',
        'sliders',
        'gallery',
        'blogs',
        'commanders',
        'links',
        'teams',
        'courses',
        'notice',
        'noc',
        'apa',
        'videos',
        'statement',
        'messages',
        'users',
        'roles',
        'permissions',
        'role_management',
        'application_settings',
        'logo_&_identity',
        'header_setting',
        'footer_setting',
        'sidebar',
        'academic_information',
        'profile_setting',
        'contact_setting',
        'smtp',
    ];

    public $customActionOrder = ['view', 'add', 'edit', 'delete'];

    public function loadPermissions()
    {
        $permissions = Permission::all();

        // Group permissions by normalized group_name
        $grouped = $permissions->groupBy(function ($item) {
            return strtolower(trim($item->group_name));
        });

        // Sort the groups by custom order
        $grouped = $grouped->sortBy(function ($_, $key) {
            $index = array_search($key, $this->customGroupOrder);
            return $index !== false ? $index : PHP_INT_MAX;
        });

        // Sort the permissions within each group by action
        $grouped = $grouped->map(function ($group) {
            return $group->sortBy(function ($permission) {
                $action = explode('.', $permission->name)[1] ?? '';
                $index = array_search($action, $this->customActionOrder);
                return $index !== false ? $index : PHP_INT_MAX;
            });
        });

        $this->groupedPermissions = $grouped;
    }

    public function mount($id)
    {
        $this->roleId = $id;
        $this->loadPermissions();
        $this->loadRole();
    }

    public function loadRole()
    {
        $role = Role::findOrFail($this->roleId);
        $this->role_name = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
    }

    public function isGroupFullySelected($permissions)
    {
        $permissionNames = collect($permissions)->pluck('name')->toArray();
        return count(array_intersect($this->selectedPermissions, $permissionNames)) === count($permissionNames);
    }

    public function updatedSelectedPermissions()
    {
        $this->dispatch('syncSelectAllCheckboxes');
    }

    public function toggleGroupPermissions($groupName, $permissions)
    {
        $permissionNames = collect($permissions)->pluck('name')->toArray();

        $hasAll = collect($permissionNames)->every(fn($perm) => in_array($perm, $this->selectedPermissions));

        if ($hasAll) {
            $this->selectedPermissions = array_diff($this->selectedPermissions, $permissionNames);
        } else {
            $this->selectedPermissions = array_unique(array_merge($this->selectedPermissions, $permissionNames));
        }
    }

    public function update()
    {
        try {


            $role = Role::findOrFail($this->roleId);

            if ($role->name === 'Master Admin') {
                $this->dispatch('toastr:error', message: 'The Master Admin role cannot be updated.');
            } else {
                $this->validate([
                    'role_name' => 'required|max:255|unique:roles,name,' . $this->roleId,
                ]);
                $role->name = $this->role_name;
                $role->save();
                $role->syncPermissions($this->selectedPermissions);

                $this->redirect(route('all-roles', absolute: false) . '?success=1', navigate: true);
            }
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.roles.edit-role')->layout('backend.template.body');
    }
}
