<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\User;
use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;

class ResetPasswordPage extends Component
{
    public string $email = '';
    public string $token = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|confirmed|min:8',
    ];

    public function mount($token = null, $email = null): void
    {
        $this->token = $token ?? '';
        $this->email = $email ?? '';

        if (!$this->token || !$this->email) {
            abort(403, 'Access token or email not found.');
        }

        $userByToken = User::where('remember_token', $this->token)->first();
        $userByEmail = User::where('email', $this->email)->first();

        if (!$userByToken || !$userByEmail || $userByToken->id !== $userByEmail->id) {
            abort(403, 'Access token or email do not match.');
        }
    }


    public function accountresetpassword(): void
    {
        try {
            $validated = $this->validate([
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ]);

            $validated['password'] = Hash::make($validated['password']);

            $manage_data = User::where('email', $this->email)->first();

            if ($manage_data) {
                $manage_data->update([
                    'remember_token'  => null,
                    'password'      => Hash::make($this->password)
                ]);
                $this->dispatch('toastr:success', message: "{$manage_data->name}, your password reset successfully!");
                $this->redirectIntended(route('account.login', absolute: false), navigate: true);
            }
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
        return view('livewire.frontend.auth.reset-password-page', compact('setting'))->layout('backend.template.body');
    }
}
