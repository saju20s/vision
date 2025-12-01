<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\User;
use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisterPage extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|confirmed|min:8',
    ];

    public function register(): void
    {
        try {
            $validated = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ]);

            $validated['password'] = Hash::make($validated['password']);

            event(new Registered($user = User::create($validated)));
          

            $this->dispatch('toastr:success', message: "{$user->name}, your account has been created successfully!");

            $this->redirectIntended(route('account.register', absolute: false), navigate: true);
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.frontend.auth.register-page', compact('setting'))->layout('backend.template.body');
    }
}
