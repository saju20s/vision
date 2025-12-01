<?php

namespace App\Livewire\Backend\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class EditUser extends Component
{
    public $userId;
    public $name;
    public $email;
    public $roles = [];
    public $selectedRoles = [];


    public function mount($id)
    {
        $this->roles = Role::where('name', '!=', 'Master Admin')
            ->pluck('name')
            ->toArray();
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->selectedRoles = $user->roles->pluck('name')->toArray();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $this->userId,
            'selectedRoles' => 'required|array|min:1',
            'selectedRoles.*' => 'string|exists:roles,name|not_in:Master Admin',
        ];
    }

    protected $messages = [
        'name.required' => 'Name is required.',
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email has already been taken.',
        'selectedRoles.required' => 'Please select at least one role.',
        'selectedRoles.*.exists' => 'Selected role is invalid.',
    ];

    public function update()
    {
        try {

            $user = User::findOrFail($this->userId);

            if ($user->email === 'shariful971@gmail.com') {
                 $this->validateOnly('name');
                 
                $user->update(['name' => $this->name]);

                $this->dispatch('toastr:success', message: 'Admin name updated only. Email and Role update are restricted.');
            } else {

                $this->validate();

                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);

                $user->syncRoles($this->selectedRoles);
                // Success message
                $this->dispatch('toastr:success', message: 'User updated successfully.');
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
        return view('livewire.backend.users.edit-user')->layout('backend.template.body');
    }
}
