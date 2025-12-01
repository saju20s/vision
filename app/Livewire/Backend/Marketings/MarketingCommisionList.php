<?php

namespace App\Livewire\Backend\Marketings;

use App\Models\Bill;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Marketing;
use Livewire\WithPagination;

class MarketingCommisionList extends Component
{
    use WithPagination;

    public $marketing_id;
    public $search = '';
    public $from_date;
    public $to_date;
    public $perPage = 20;
    public $marketing;
    public $total_commission = 0;
    public $marketingResults = [];
    public $showMarketingList = false;

    public function mount($marketing_id = null)
    {
        $this->marketing_id = $marketing_id;
        if ($marketing_id) {
            $this->marketing = Marketing::find($marketing_id);
        }
    }

    public function searchMarketing()
    {
        if (strlen($this->search) < 1) {
            $this->marketingResults = Marketing::orderBy('name')->limit(20)->get();
        } else {
            $this->marketingResults = Marketing::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('name')
                ->limit(20)
                ->get();
        }

        $this->showMarketingList = true;
    }

    public function selectMarketing($marketingId)
    {
        $this->marketing_id = $marketingId;
        $this->marketing = Marketing::find($marketingId);
        $this->search = $this->marketing->name ?? '';
        $this->showMarketingList = false;
    }

    public function loadMore()
    {
        $this->perPage += 20;
    }

    public function filterByDate()
    {
        $this->resetPage(); // Reset pagination on filter change
    }

    public function getBillsQuery()
    {
        $query = Bill::query()
            ->whereNotNull('marketing_commision')
            ->orderBy('created_at', 'desc')
            ->with('marketing', 'patient');

        if (!empty($this->marketing_id)) {
            $query->where('marketing_id', $this->marketing_id);
        }

        if ($this->from_date && $this->to_date) {
            $from = date('Y-m-d 00:00:00', strtotime($this->from_date));
            $to = date('Y-m-d 23:59:59', strtotime($this->to_date));
            $query->whereBetween('created_at', [$from, $to]);
        }

        return $query;
    }

    public function render()
    {
        $bills = $this->getBillsQuery()->paginate($this->perPage);
        $this->total_commission = $this->getBillsQuery()->sum('marketing_commision');
        $setting = Setting::find(1);

        return view('livewire.backend.marketings.marketing-commision-list', [
            'bills' => $bills,
            'setting' => $setting,
        ])->layout('backend.template.body');
    }
}
