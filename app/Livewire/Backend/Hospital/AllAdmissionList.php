<?php

namespace App\Livewire\Backend\Hospital;

use Livewire\Component;
use App\Models\Admission;
use Livewire\WithPagination;

class AllAdmissionList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $searchInput = '';
    public $status = '';
    public $from_date = '';
    public $to_date = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
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

    public function submitSearch()
    {
        $this->search = $this->searchInput;
        $this->resetPage();
    }

    public function render()
    {
        $admissions = Admission::with(['patient', 'bed', 'user'])
            ->where(function ($query) {
                $query->whereHas('patient', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('patient_id', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                })
                    ->orWhere('admission_id', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($q) {
                $q->where('status', $this->status);
            })
            ->when($this->from_date, function ($q) {
                $q->whereDate('admit_date', '>=', $this->from_date);
            })
            ->when($this->to_date, function ($q) {
                $q->whereDate('admit_date', '<=', $this->to_date);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.backend.hospital.all-admission-list', [
            'datas' => $admissions,
        ])->layout('backend.template.body');
    }
}
