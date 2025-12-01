<?php

namespace App\Livewire\Backend\Expenses;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Expensehistory;

class AllExpenseHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $from_date;
    public $to_date;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFromDate()
    {
        $this->resetPage();
    }

    public function updatingToDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $unique = Expensehistory::select('expense_id')
            ->distinct()
            ->when($this->search, function ($q) {
                $q->where('expense_id', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('name', 'LIKE', '%' . $this->search . '%');
            })
            ->when($this->from_date, function ($q) {
                $q->whereDate('created_at', '>=', $this->from_date);
            })
            ->when($this->to_date, function ($q) {
                $q->whereDate('created_at', '<=', $this->to_date);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        $groupedHistories = [];

        foreach ($unique as $row) {
            $groupedHistories[$row->expense_id] =
                Expensehistory::with('category')
                ->where('expense_id', $row->expense_id)
                ->when($this->from_date, function ($q) {
                    $q->whereDate('created_at', '>=', $this->from_date);
                })
                ->when($this->to_date, function ($q) {
                    $q->whereDate('created_at', '<=', $this->to_date);
                })
                ->orderBy('id', 'desc') 
                ->get();
        }

        return view('livewire.backend.expenses.all-expense-history', [
            'datas' => $groupedHistories,
            'unique' => $unique
        ])->layout('backend.template.body');
    }
}

