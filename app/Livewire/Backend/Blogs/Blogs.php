<?php

namespace App\Livewire\Backend\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
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

        $blog = Blog::findOrFail($this->deleteId);

        // Optional: delete image if it exists
        if ($blog->image) {
            $imagePath = public_path('storage/' . $blog->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            } else {
                $this->dispatch('toastr:warning', message: 'Image file not found.');
            }
        }

        $blog->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Blog deleted successfully.');
    }

    public function render()
    {
        $blogs = Blog::query()
            ->when(
                $this->search,
                fn($query) => $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(10);

        return view('livewire.backend.blogs.blogs', [
            'datas' => $blogs,
        ])->layout('backend.template.body');
    }
}
