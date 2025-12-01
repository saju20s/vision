<?php

namespace App\Livewire\Frontend;

use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Slider;
use App\Models\Patient;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Department;

class HomePage extends Component
{

    public $slider;
    public $latestDoctor;
    public $randomDoctor;
    public $latestBlogs;
    public $departments;

    public function mount()
    {
        $this->slider = Slider::where('type', 'home')->get();
        $this->latestDoctor = Doctor::where('is_active', 1)
            ->latest()
            ->get();

        $this->randomDoctor = Doctor::where('is_active', 1)
            ->inRandomOrder()
            ->get();
        $this->latestBlogs = Blog::with('category')
            ->latest()
            ->take(8)
            ->get();

        $this->departments = Department::latest()->get();
    }

    public function incrementView($blogId)
    {
        $blog = Blog::find($blogId);

        if ($blog) {
            $blog->increment('views');
        }
    }

    public function formatViews($number)
    {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 1) . 'B';
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 1) . 'k';
        } else {
            return $number;
        }
    }

    public function render()
    {
        $setting = Setting::find(1);

        $patients = Patient::where('type', 'patient')->latest()->take(10)->get();

        return view('livewire.frontend.home-page', [
            'slider' => $this->slider,
            'setting' => $setting,
            'latestDoctors'  => $this->latestDoctor,
            'randomDoctors'  => $this->randomDoctor,
            'latestBlogs' => $this->latestBlogs,
            'patients' => $patients,
            'departments' => $this->departments,
        ])->layout('frontend.template.body');
    }
}
