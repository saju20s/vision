<?php

namespace App\Livewire\Backend\Teams;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class Teams extends Component
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
        $team = Team::findOrFail($this->deleteId);

        // Optional: delete image file if needed
        if ($team->image && file_exists(public_path('storage/' . $team->image))) {
            unlink(public_path('storage/' . $team->image));
        }


        $team->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Team deleted successfully.');
    }


    public function render()
    {
        $teams = Team::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('name', 'like', '%' . $this->search . '%')
            )
            ->latest()->paginate(10);

        return view('livewire.backend.teams.teams', [
            'datas' => $teams,
        ])->layout('backend.template.body');
    }
}
