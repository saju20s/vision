<?php

namespace App\Livewire\Backend\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Sliders extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $slider = Slider::findOrFail($this->deleteId);

        // Optional: delete image file if needed
        if ($slider->image && file_exists(public_path('storage/' . $slider->image))) {
            unlink(public_path('storage/' . $slider->image));
        }


        $slider->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Slider deleted successfully.');
    }


    public function render()
    {
        $slider = Slider::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->where('type', 'home')
            ->latest()
            ->paginate(10);

        return view('livewire.backend.sliders.sliders', [
            'datas' => $slider,
        ])->layout('backend.template.body');
    }
}
