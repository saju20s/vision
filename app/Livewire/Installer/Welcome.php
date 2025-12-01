<?php

namespace App\Livewire\Installer;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.installer.welcome')->layout('installer.body');
    }
}
