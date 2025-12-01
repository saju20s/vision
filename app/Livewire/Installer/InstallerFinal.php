<?php

namespace App\Livewire\Installer;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class InstallerFinal extends Component
{
    public string $message = '';
    public bool $installed = false;

    public function mount()
    {
        try {
            // Run migrations and seeders
            Artisan::call('migrate:fresh', ['--seed' => true]);

            // Create installed marker
            $installationData = [
                'date' => now()->toDateTimeString(),
                'version' => '1.0.0',
                'url' => config('app.url'),
                'ip' => request()->ip(),
                'checksum' => Str::random(32),
            ];

            File::put(storage_path('installed'), json_encode($installationData, JSON_PRETTY_PRINT));

            $this->installed = true;
        } catch (\Exception $e) {
            $this->message = $e->getMessage(); // Store error message for display
            $this->installed = false;
        }
    }




    public function render()
    {
        return view('livewire.installer.installer-final')->layout('installer.body');
    }
}
