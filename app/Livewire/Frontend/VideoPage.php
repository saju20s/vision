<?php

namespace App\Livewire\Frontend;

use App\Models\Video;
use App\Models\Setting;
use Livewire\Component;

class VideoPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.video-page', [
            'datas' => Video::latest()->paginate(12),
            'setting' => Setting::find(1),
        ])->layout('frontend.template.body');
    }
}
