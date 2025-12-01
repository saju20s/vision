<?php

namespace App\Livewire\Frontend;

use App\Models\Patient;
use App\Models\Setting;
use Livewire\Component;

class TestimonialView extends Component
{
    public $patientId;
    public $patient;

    public function mount($id)
    {
        $this->patientId = $id;
        $this->patient = Patient::findOrFail($id);
    }


    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.frontend.testimonial-view',[
            'setting' => $setting
        ])->layout('frontend.template.body');
    }
}
