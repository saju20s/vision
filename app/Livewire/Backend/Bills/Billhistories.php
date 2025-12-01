<?php

namespace App\Livewire\Backend\Bills;

use App\Models\Billhistory;
use Livewire\Component;
use Livewire\WithPagination;

class Billhistories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $from_date;
    public $to_date;

    public $bills;

    public function mount()
    {
        $this->bills = Billhistory::with('patient')->latest()->get();
    }
    
    public function updatingFromDate()
    {
        $this->resetPage();
    }

    public function updatingToDate()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function searchInvoice()
    {
        $this->resetPage();
        $this->bills = Billhistory::with(['patient', 'items.investigation'])
            ->where('invoice_number', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(10);
    }



    public function render()
    {
        // Base query
        $query = Billhistory::with(['patient', 'items.investigation'])
                    ->whereIn('id', function ($q) {
                        $q->selectRaw('MIN(id)')
                          ->from('billhistories')
                          ->groupBy('invoice_number');
                    });

        // Apply search filter if search text exists
        if ($this->search) {
            $query->where('invoice_number', 'like', "%{$this->search}%");
        }
        
        if ($this->from_date) {
            $query->whereDate('created_at', '>=', $this->from_date);
        }

        if ($this->to_date) {
            $query->whereDate('created_at', '<=', $this->to_date);
        }

        $bills = $query->latest('id')->paginate(50);

        return view('livewire.backend.bills.billhistories', [
            'datas' => $bills,
        ])->layout('backend.template.body');
    }
}
