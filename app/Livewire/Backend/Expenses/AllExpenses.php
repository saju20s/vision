<?php

namespace App\Livewire\Backend\Expenses;

use App\Models\Expense;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class AllExpenses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';
    public $fromDate;
    public $toDate;
    
    public function mount()
    {
        $today = now()->format('Y-m-d');
        $this->fromDate = $today;
        $this->toDate = $today;
    }

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

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $expenses = Expense::findOrFail($this->deleteId);
        $expenses->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Expense deleted successfully.');
    }

    public function render()
    {
        $expenses = Expense::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('name', 'like', '%' . $this->search . '%')
            )
            ->when(
                $this->fromDate && $this->toDate,
                fn($query) =>
                $query->whereBetween('date', [$this->fromDate, $this->toDate])
            )
            ->latest()
            ->paginate(50);
        $setting = Setting::find(1);

        return view('livewire.backend.expenses.all-expenses', [
            'datas' => $expenses,
            'setting' => $setting,
        ])->layout('backend.template.body');
    }
}
