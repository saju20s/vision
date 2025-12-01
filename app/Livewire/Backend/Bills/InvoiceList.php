<?php

namespace App\Livewire\Backend\Bills;

use App\Models\Bill;
use Livewire\Component;
use Livewire\WithPagination;
use Picqer\Barcode\BarcodeGeneratorPNG;

class InvoiceList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $filter = 'all';
    public $from_date;
    public $to_date;
    
    public function mount()
    {
        $today = now()->format('Y-m-d');
        $this->from_date = $today;
        $this->to_date = $today;
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

    public function setFilter($type)
    {
        $this->filter = $type;
        $this->resetPage();
    }

    public function generateBarcode($code)
    {
        $generator = new BarcodeGeneratorPNG();
        return 'data:image/png;base64,' . base64_encode(
            $generator->getBarcode($code, $generator::TYPE_CODE_128, 2, 60)
        );
    }

    public function formatCount($count)
    {
        if ($count >= 1000000) return number_format($count / 1000000, 1) . 'M';
        elseif ($count >= 1000) return number_format($count / 1000, 1) . 'K';
        return $count;
    }

    public function render()
    {
        $query = Bill::with('patient');

        // Filter by due, paid, all
        if ($this->filter === 'due') {
            $query->where('due_amount', '>', 0);
        } elseif ($this->filter === 'paid') {
            $query->where('due_amount', '=', 0);
        }

        // Date range filter
        if ($this->from_date && $this->to_date) {
            $query->whereBetween('created_at', [
                $this->from_date . ' 00:00:00',
                $this->to_date . ' 23:59:59',
            ]);
        } elseif ($this->from_date) {
            $query->whereDate('created_at', '>=', $this->from_date);
        } elseif ($this->to_date) {
            $query->whereDate('created_at', '<=', $this->to_date);
        }

        // Search
        if ($this->search) {
            $term = '%' . trim($this->search) . '%';
            $query->where(function ($q) use ($term) {
                $q->where('invoice_number', 'like', $term)
                    ->orWhereHas('patient', function ($sub) use ($term) {
                        $sub->where('name', 'like', $term)
                            ->orWhere('phone', 'like', $term)
                            ->orWhere('patient_id', 'like', $term);
                    });
            });
        }

        $bills = $query->latest()->paginate(50);

        // Count & totals
        $countAll = $this->formatCount(Bill::count());
        $countDue = $this->formatCount(Bill::where('due_amount', '>', 0)->count());
        $countPaid = $this->formatCount(Bill::where('due_amount', '=', 0)->count());
        $totalDue = (clone $query)->sum('due_amount');

        return view('livewire.backend.bills.invoice-list', [
            'datas' => $bills,
            'countAll' => $countAll,
            'countDue' => $countDue,
            'countPaid' => $countPaid,
            'totalDue' => $totalDue,
        ])->layout('backend.template.body');
    }
}
