<?php

namespace App\Livewire\Backend\Notices;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class NocNotices extends Component
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
        $notice = Notice::findOrFail($this->deleteId);

        // Optional: delete image file if needed
        if ($notice->image && file_exists(public_path('storage/' . $notice->image))) {
            unlink(public_path('storage/' . $notice->image));
        }

        // Delete file if exists
        if ($notice->file && file_exists(public_path('storage/' . $notice->file))) {
            unlink(public_path('storage/' . $notice->file));
        }

        $notice->delete();
        $this->deleteId = null;

        // Dispatch Toastr success event
        $this->dispatch('toastr:success', message: 'NOC Notice deleted successfully.');
    }

    public function render()
    {
        $notices = Notice::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->where('type', 'noc')->latest()->paginate(10);

        return view('livewire.backend.notices.noc-notices', [
            'datas' => $notices,
        ])->layout('backend.template.body');
    }
}
