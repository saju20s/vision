<?php

namespace App\Livewire\Backend\Commenders;

use Livewire\Component;
use App\Models\Commander;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Commenders extends Component
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

        $commander = Commander::findOrFail($this->deleteId);

        // Delete image if it exists
        if ($commander->image && file_exists(public_path('storage/' . $commander->image))) {
            unlink(public_path('storage/' . $commander->image));
        }

        $commander->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Commander deleted successfully.');
    }

    public function render()
    {
        $commanders = Commander::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('name', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(10);

        return view('livewire.backend.commenders.commenders', [
            'datas' => $commanders,
        ])->layout('backend.template.body');
    }
}
