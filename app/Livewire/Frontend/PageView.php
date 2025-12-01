<?php

namespace App\Livewire\Frontend;

use App\Models\Page;
use App\Models\Setting;
use Livewire\Component;

class PageView extends Component
{
    public $page;

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->first();
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.frontend.page-view', [
            'page' => $this->page,
            'setting' => $setting,
        ])->layout('frontend.template.body');
    }
}
