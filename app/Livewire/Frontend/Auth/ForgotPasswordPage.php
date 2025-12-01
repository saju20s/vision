<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\User;
use App\Models\Setting;
use Livewire\Component;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ForgotPasswordPage extends Component
{
    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        try {
            $this->validate([
                'email' => ['required', 'string', 'email'],
            ]);

            $user = User::where('email', $this->email)->first();

            if ($user) {
                $token = md5(time() . rand());
                $user->update([
                    'remember_token'  => $token
                ]);

                Mail::to($user)->send(new ForgotPasswordMail($user, $token));

                $this->dispatch('toastr:success', message: "Please check your email.");
            } else {
                $this->dispatch('toastr:error', message: "We couldn't find your email address. Please register first.");
            }
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        }
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.frontend.auth.forgot-password-page', compact('setting'))->layout('backend.template.body');
    }
}
