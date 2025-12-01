<?php

namespace App\Livewire\Backend\Links;

use App\Models\Link;
use Livewire\Component;
use Livewire\WithPagination;

class Links extends Component
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

        $link = Link::findOrFail($this->deleteId);

        if ($link->image && file_exists(public_path('storage/' . $link->image))) {
            unlink(public_path('storage/' . $link->image));
        }

        $link->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Link deleted successfully.');
    }

    public function render()
    {
        $links = Link::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(10);

        return view('livewire.backend.links.links', [
            'datas' => $links,
        ])->layout('backend.template.body');
    }
}
