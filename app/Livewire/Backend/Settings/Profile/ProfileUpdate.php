<?php

namespace App\Livewire\Backend\Settings\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ProfileUpdate extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $image;
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount()
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }

        $user = auth()->user();
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function store()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255'
            ]);

            $user = auth()->user();

            $user->name = $this->name;
            $user->email = $this->email;

            if ($this->image) {
                if ($user->image && file_exists(public_path('storage/' . $user->image))) {
                    unlink(public_path('storage/' . $user->image));
                }
                $user->image = $this->image->store('settings', 'public');
            }

            $user->save();

            // Success message
            $this->dispatch('toastr:success', message: 'Profile updated successfully.');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function passwordUpdate()
    {
        try {
            // Manual password check error
            if (!Hash::check($this->current_password, auth()->user()->password)) {
                $this->addError('current_password', 'The current password is incorrect.');
                return $this->dispatch('toastr:error', message: 'Your Password not match.');
            } else {

                $this->validate([
                    'password' => ['required', 'min:8', 'confirmed'],
                ]);

                auth()->user()->update([
                    'password' => Hash::make($this->password),
                ]);

                $this->reset(['current_password', 'password', 'password_confirmation']);

                // Success message
                $this->dispatch('toastr:success', message: 'Password updated successfully.');
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
        $id = Auth::id();
        $user = User::findOrFail($id);

        return view('livewire.backend.settings.profile.profile-update', [
            'datas' => $user,
        ])->layout('backend.template.body');
    }
}
