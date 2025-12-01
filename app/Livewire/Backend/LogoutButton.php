<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutButton extends Component
{

    public function logout()
    {
        Auth::logout();

        session()->flush();
        session()->invalidate();
        session()->regenerateToken();

        $logPath = storage_path('logs/laravel.log');
        if (file_exists($logPath)) {
            file_put_contents($logPath, '');
        }

        return $this->redirect('/account-login');
        // return $this->redirect('/account-login', navigate: true);
        // $this->redirect('/login', navigate: true);


    }

    public function render()
    {
        return view('livewire.backend.logout-button', [
            'user' => Auth::user(),
        ]);
    }
}
