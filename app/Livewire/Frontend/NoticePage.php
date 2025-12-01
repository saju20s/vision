<?php

namespace App\Livewire\Frontend;

use App\Models\Notice;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class NoticePage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';   

    public function render()
    {
        $notices = Notice::where('type', 'notice')
            ->latest()
            ->paginate(10);

        $setting = Setting::find(1);

        return view('livewire.frontend.notice-page', [
            'datas' => $notices,
            'setting' => $setting
        ])->layout('frontend.template.body');
    }
}
