<?php

namespace App\Livewire\Backend\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AddUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $roles = [];
    public $selectedRole;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'selectedRole' => 'required|string|exists:roles,name|not_in:Master Admin',
    ];

    protected $messages = [
        'name.required' => 'Name is required.',
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email has already been taken.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.confirmed' => 'Password and confirm password do not match.',
        'selectedRole.required' => 'Please select a role.',
        'selectedRole.exists' => 'Selected role is invalid.',
    ];

    public function mount()
    {
        $this->roles = Role::where('name', '!=', 'Master Admin')
            ->pluck('name')
            ->toArray();
    }



    public function store()
    {
        try {
            // Validate data
            $this->validate();

            // Create page
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'is_active' => true,
                'password' => Hash::make($this->password),
            ]);

            $user->assignRole($this->selectedRole);


            // Reset form inputs
            $this->reset(['name', 'email', 'password', 'password_confirmation', 'selectedRole']);

            $this->dispatch('toastr:success', message: 'User created successfully.');
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
        return view('livewire.backend.users.add-user')->layout('backend.template.body');
    }
}
