<?php

namespace App\Livewire\Backend\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;

class Permissions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $deleteId;
    public $permissionId = null;

    public $name = '';
    public $group_name = '';
    public $selectedAction = '';

    public $showModal = false;
    public $showAnimatedModal = false;

    protected function rules()
    {
        $uniqueRule = 'unique:permissions,name';

        if ($this->permissionId) {
            $uniqueRule .= ',' . $this->permissionId;
        }

        return [
            'group_name' => 'required|string',
            'name' => ['required', 'string', $uniqueRule],
        ];
    }

    public function updatedGroupName()
    {
        if ($this->selectedAction) {
            $this->name = $this->group_name . '.' . $this->selectedAction;
        } else {
            $this->name = $this->group_name;
        }
    }

    public function setAction($action)
    {
        $this->selectedAction = $action;
        $this->name = $this->group_name ? $this->group_name . '.' . $action : $action;
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
        $this->showAnimatedModal = true;
    }

    public function closeModal()
    {
        $this->showAnimatedModal = false;
        $this->dispatch('closeModalAfterDelay');
    }

    public function resetForm()
    {
        $this->reset(['permissionId', 'name', 'group_name', 'selectedAction']);
    }

    public function store()
    {
        try {
            $this->validate();

            if ($this->permissionId) {
                // Update
                $permission = Permission::findOrFail($this->permissionId);
                $permission->update([
                    'name' => $this->name,
                    'group_name' => $this->group_name,
                ]);
                $this->dispatch('toastr:success', message: 'Permission updated successfully!');
            } else {
                // Create
                Permission::create([
                    'name' => $this->name,
                    'group_name' => $this->group_name,
                    'guard_name' => 'web',
                ]);
                $this->dispatch('toastr:success', message: 'Permission created successfully!');
            }

            $this->closeModal();
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        $this->permissionId = $permission->id;
        $this->name = $permission->name;
        $this->group_name = $permission->group_name;

        // Detect action from name
        $parts = explode('.', $this->name);
        $this->selectedAction = end($parts);

        $this->showModal = true;
        $this->showAnimatedModal = true;
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        try {
            $permission = Permission::findOrFail($this->deleteId);
            $permission->delete();
            $this->dispatch('toastr:success', message: 'Permission deleted successfully.');
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }

        $this->deleteId = null;
    }

    public function render()
    {
        $datas = Permission::query()
            ->when($this->search, fn ($query) =>
                $query->where('name', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(50);

        return view('livewire.backend.permissions.permissions', compact('datas'))
            ->layout('backend.template.body');
    }
}
