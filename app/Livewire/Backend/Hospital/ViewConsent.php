<?php

namespace App\Livewire\Backend\Hospital;

use Livewire\Component;
use App\Models\Otconsent;
use App\Models\Setting;

class ViewConsent extends Component
{
    public $consent;

    public function mount($id)
    {
        $this->consent = Otconsent::findOrFail($id);
    }

    public function render()
    {
        $settings = Setting::find(1);
        return view('livewire.backend.hospital.view-consent', [
            'setting' => $settings,
        ])->layout('backend.template.body');
    }
}
