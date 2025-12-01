<?php

namespace App\Livewire\Backend\Delivery;

use App\Models\Report;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class AllPatients extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    protected $queryString = ['search'];

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $latestReportIds = Report::selectRaw('MAX(id) as id')
            ->whereHas('patient', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            })
            ->groupBy('patient_id');

        $datas = Report::with('patient')
            ->whereIn('id', $latestReportIds)
            ->latest()
            ->paginate(50);
        $setting = Setting::find(1);

        return view('livewire.backend.delivery.all-patients', [
            'datas' => $datas,
            'setting' => $setting,
        ])->layout('backend.template.body');
    }
}
