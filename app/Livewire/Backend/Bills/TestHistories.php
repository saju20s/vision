<?php

namespace App\Livewire\Backend\Bills;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Billitem;
use App\Models\Setting;
use Livewire\WithPagination;

class TestHistories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public string $filter = 'all';
    public ?string $from_date = null;
    public ?string $to_date = null;
    public int $perPage = 31;

    public function filterByDate()
    {
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->perPage += 31;
    }

    public function getBillItemsProperty()
    {
        $query = Billitem::with('investigation');

        $isFiltered = false;

        // Dropdown filter
        if ($this->filter === 'this_month') {
            $isFiltered = true;
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        } elseif ($this->filter === 'last_month') {
            $isFiltered = true;
            $query->whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->subMonth()->year);
        } elseif ($this->filter === 'last_year') {
            $isFiltered = true;
            $query->where('created_at', '>=', now()->subYear());
        }

        // Date range filter
        if ($this->from_date && $this->to_date) {
            $isFiltered = true;
            $query->whereBetween('created_at', [
                Carbon::parse($this->from_date)->startOfDay(),
                Carbon::parse($this->to_date)->endOfDay(),
            ]);
        }

        $query->orderBy('created_at', 'desc');

        if ($isFiltered) {
            return $query->get();
        }

        // Otherwise, use pagination
        return $query->paginate($this->perPage);
    }

    public function getGroupedBillItemsProperty()
    {
        $query = Billitem::with('investigation');

        $isFiltered = false;

        if ($this->filter === 'this_month') {
            $isFiltered = true;
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        } elseif ($this->filter === 'last_month') {
            $isFiltered = true;
            $query->whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->subMonth()->year);
        } elseif ($this->filter === 'last_year') {
            $isFiltered = true;
            $query->where('created_at', '>=', now()->subYear());
        }

        if ($this->from_date && $this->to_date) {
            $isFiltered = true;
            $query->whereBetween('created_at', [
                Carbon::parse($this->from_date)->startOfDay(),
                Carbon::parse($this->to_date)->endOfDay(),
            ]);
        }

        $query->orderBy('created_at', 'desc');

        // fetch all records after filtering
        $items = $isFiltered ? $query->get() : $query->paginate($this->perPage);

        // Group by test_name and count
        return collect($items)->groupBy(function ($item) {
            return $item->investigation->test_name ?? 'N/A';
        })->map(function ($group) {
            return [
                'test_name' => $group->first()->investigation->test_name ?? 'N/A',
                'count' => $group->count(),
                'quantity' => $group->sum('quantity'),
                'total' => $group->sum('total'),
            ];
        })->values();
    }





    public function render()
    {
        $from = $this->from_date ? Carbon::parse($this->from_date)->format('d/m/Y') : null;
        $to = $this->to_date ? Carbon::parse($this->to_date)->format('d/m/Y') : null;
        $printDate = now()->format('d/m/Y h:i A');
        $setting = Setting::find(1);

        return view('livewire.backend.bills.test-histories', [
            'billItems' => $this->billItems,
            'from' => $from,
            'to' => $to,
            'printDate' => $printDate,
            'setting' => $setting,
        ])->layout('backend.template.body');
    }
}
