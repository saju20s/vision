<?php
namespace App\Livewire\Backend\Activity;

use Livewire\Component;
use App\Models\ActivityLog;
use Livewire\WithPagination;

class Activities extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $deleteIds = []; // This will hold the IDs of selected logs
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteIds = [$id]; // Set the deleteId to single value
    }

    public function confirmBatchDelete()
    {
        $this->deleteIds = ActivityLog::pluck('id')->toArray(); // Select all logs for batch deletion
    }

    public function delete()
    {
        ActivityLog::whereIn('id', $this->deleteIds)->delete();
        $this->deleteIds = [];

        $this->dispatch('toastr:success', message: 'Activity(s) deleted successfully.');
    }

    public function render()
    {
        $logs = ActivityLog::with('user')
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(50);

        return view('livewire.backend.activity.activities', [
            'datas' => $logs
        ])->layout('backend.template.body');
    }
}
