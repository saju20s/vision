<?php

namespace App\Livewire\Frontend;

use App\Models\Notice;
use App\Models\Setting;
use Livewire\Component;

class ViewNotice extends Component
{
    public $notice;

    public function mount($id)
    {
        $this->notice = Notice::findOrFail($id);
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.frontend.view-notice', [
            'notice' => $this->notice,
            'setting' => $setting
        ])->layout('frontend.template.body');
    }
}
