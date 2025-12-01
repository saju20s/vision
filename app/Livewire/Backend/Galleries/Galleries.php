<?php

namespace App\Livewire\Backend\Galleries;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Galleries extends Component
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

        // Delete image if exists
        if ($slider->image && file_exists(public_path('storage/' . $slider->image))) {
            unlink(public_path('storage/' . $slider->image));
        }

        $slider->delete();
        $this->deleteId = null;

        // Toastr success message
        $this->dispatch('toastr:success', message: 'Gallery deleted successfully.');
    }

    public function render()
    {
        $slider = Slider::query()
            ->when($this->search, fn ($query) =>
                $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->where('type', 'gallery')
            ->latest()
            ->paginate(10);

        return view('livewire.backend.galleries.galleries', [
            'datas' => $slider,
        ])->layout('backend.template.body');
    }
}
