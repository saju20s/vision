<?php

namespace App\Livewire\Backend\Pages;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Pages extends Component
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
        $page = Page::findOrFail($this->deleteId);

        // Optional: delete image file if needed
        if ($page->image && file_exists(public_path('storage/' . $page->image))) {
            unlink(public_path('storage/' . $page->image));
        }


        $page->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Page deleted successfully.');
    }


    public function render()
    {
        $pages = Page::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('title', 'like', '%' . $this->search . '%')
            )->latest()->paginate(10);

        return view('livewire.backend.pages.pages', [
            'datas' => $pages,
        ])->layout('backend.template.body');
    }
}
