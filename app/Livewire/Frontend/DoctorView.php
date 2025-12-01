<?php

namespace App\Livewire\Frontend;

use App\Models\Doctor;
use App\Models\Setting;
use Livewire\Component;

class DoctorView extends Component
{
    public $doctor;
    public $setting;

    public function mount($id)
    {
        $this->doctor = Doctor::where('is_active', true)->findOrFail($id);
        $this->setting = Setting::find(1);
    }

    public function render()
    {
        // Related doctors query
        $relatedDoctors = Doctor::where('specialization', $this->doctor->specialization)
            ->where('id', '!=', $this->doctor->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        $setting = Setting::find(1);

        return view('livewire.frontend.doctor-view', [
            'setting' => $this->setting,
            'relatedDoctors' => $relatedDoctors,
            'setting' => $setting
        ])->layout('frontend.template.body');
    }
}
