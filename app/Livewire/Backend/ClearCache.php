<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class ClearCache extends Component
{
    public function clear()
    {
        try {
            Artisan::call('optimize:clear');
            $this->dispatch('toastr:success', message: 'Cache cleared successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.clear-cache')->layout('backend.template.body');
    }
}
