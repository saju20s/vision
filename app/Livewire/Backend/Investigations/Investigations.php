<?php

namespace App\Livewire\Backend\Investigations;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Investigation;

class Investigations extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';
    public $filter = 'all';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setFilter($type)
    {
        $this->filter = $type;
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {

        $investigation = Investigation::findOrFail($this->deleteId);


        $investigation->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Investigation deleted successfully.');
    }

    public function formatCount($count)
    {
        if ($count >= 1000000) {
            return number_format($count / 1000000, 1) . 'M';
        } elseif ($count >= 1000) {
            return number_format($count / 1000, 1) . 'K';
        } else {
            return $count;
        }
    }



    public function render()
    {
        // Department-wise count
        $departments = Investigation::select('department')
            ->distinct()
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->department,
                    'count' => $this->formatCount(
                        Investigation::where('department', $item->department)->count()
                    )
                ];
            });


        $investigations = Investigation::query()
            ->when($this->search, function ($query) {
                $search = '%' . $this->search . '%';
                $query->where(function ($q) use ($search) {
                    $q->where('test_name', 'like', $search)
                        ->orWhere('department', 'like', $search);
                });
            })
            ->when($this->filter !== 'all', function ($query) {
                $query->where('department', $this->filter);
            })
            ->latest()
            ->paginate(50);
        return view('livewire.backend.investigations.investigations', [
            'datas' => $investigations,
            'departments' => $departments,
            'all_tests' => $this->formatCount(Investigation::count()),
        ])->layout('backend.template.body');
    }
}
