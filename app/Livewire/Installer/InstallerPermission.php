<?php

namespace App\Livewire\Installer;

use Livewire\Component;

class InstallerPermission extends Component
{
    public array $permissions = [];

    public function mount()
    {
        $this->permissions = [
            'storage/' => is_writable(storage_path()),
            'storage/app/' => is_writable(storage_path('app')),
            'storage/framework/' => is_writable(storage_path('framework')),
            'storage/logs/' => is_writable(storage_path('logs')),
            'bootstrap/cache/' => is_writable(base_path('bootstrap/cache')),
        ];
    }
    



    public function render()
    {
        return view('livewire.installer.installer-permission')->layout('installer.body');
    }
}
