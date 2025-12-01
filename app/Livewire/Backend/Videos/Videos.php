<?php

namespace App\Livewire\Backend\Videos;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Videos extends Component
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
        $video = Video::findOrFail($this->deleteId)->delete();
        $this->deleteId = null;
        $this->dispatch('toastr:success', message: 'Video deleted successfully.');
    }

    public function render()
    {
        $videos = Video::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->latest()->paginate(10);

        return view('livewire.backend.videos.videos', [
            'datas' => $videos,
        ])->layout('backend.template.body');
    }
}
