<?php

namespace App\Livewire\Installer;

use Livewire\Component;

class Requirement extends Component
{
    public array $requirements = [];

    public function mount()
    {
        $this->requirements = [
            'PHP >= 8.2' => version_compare(PHP_VERSION, '8.2.0', '>='),
            'imap' => extension_loaded('imap'), // IMAP extension is required for email functionality
            'BCMath' => extension_loaded('bcmath'), //
            'Ctype' => extension_loaded('ctype'),
            'JSON' => extension_loaded('json'), // JSON extension is required for configuration files
            'Mbstring' => extension_loaded('mbstring'),
            'OpenSSL' => extension_loaded('openssl'), // for secure connections 
            'PDO' => extension_loaded('pdo'), // PDO extension is required for database connections
            'Tokenizer' => extension_loaded('tokenizer'),
            'XML' => extension_loaded('xml'),
        ];
    }


    public function render()
    {
        return view('livewire.installer.requirement')->layout('installer.body');
    }
}
