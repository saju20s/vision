<?php

namespace App\Livewire\Backend\Employees;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Patient;
use Livewire\Component;

class EmployeeHistory extends Component
{
    public $patient; 
    public $search = '';
    public $filter = 'all';
    public $bills;
    public $from_date;
    public $to_date;
    public $perPage = 31;

    public function mount($id)
    {
        $this->patient = Patient::findOrFail($id);
        $this->loadBills();
    }

    public function loadMore()
    {
        $this->perPage += 31;
        $this->loadBills();
    }

    public function updatedSearch()
    {
        $this->loadBills();
    }

    public function updatedFilter()
    {
        $this->loadBills();
    }

    public function filterByDate()
    {
        $this->loadBills();
    }

    private function loadBills()
    {
        $query = Bill::with('patient')
            ->where('patient_id', $this->patient->id);

        // Search by invoice number
        if (!empty($this->search)) {
            $query->where('invoice_number', 'like', "%{$this->search}%");
        }

        // Date filter
        if (!empty($this->from_date) && !empty($this->to_date)) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->from_date)->startOfDay(),
                Carbon::parse($this->to_date)->endOfDay(),
            ]);
        } else {
            if ($this->filter === 'this_month') {
                $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
            } elseif ($this->filter === 'last_month') {
                $query->whereMonth('created_at', Carbon::now()->subMonth()->month)
                    ->whereYear('created_at', Carbon::now()->subMonth()->year);
            } elseif ($this->filter === 'last_year') {
                $query->where('created_at', '>=', Carbon::now()->subYear());
            }
        }

        $this->bills = $query->orderBy('created_at', 'desc')
            ->take($this->perPage)
            ->get();
    }

    public function render()
    {
        return view('livewire.backend.employees.employee-history')->layout('backend.template.body');
    }
}
