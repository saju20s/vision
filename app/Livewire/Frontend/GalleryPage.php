<?php

namespace App\Livewire\Frontend;

use App\Models\Slider;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $showModal = false;
    public $modalImage = null;
    public $modalTitle = null;

    public function openModal($image, $title)
    {
        $this->modalImage = $image;
        $this->modalTitle = $title;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->modalImage = null;
        $this->modalTitle = null;
    }

    public function render()
    {
        return view('livewire.frontend.gallery-page', [
            'datas' => Slider::where('type', 'gallery')->latest()->paginate(12),
            'setting' => Setting::find(1),
        ])->layout('frontend.template.body');
    }
}
