<?php

namespace App\Livewire\Backend\Delivery;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class PatientReports extends Component
{
    use WithPagination;

    public $patientId;
    public $deleteId;
    public $patientName = '';
    public $patientPhone = '';
    public $patientAge = '';

    public $invoiceSearch = '';
    public $dateSearch = '';

    protected $paginationTheme = 'bootstrap';

    public function mount($patientId)
    {
        $this->patientId = $patientId;
    }

    public function updatingInvoiceSearch()
    {
        $this->resetPage();
    }

    public function updatingDateSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        try {
            $report = Report::findOrFail($this->deleteId);
            $report->delete();

            $this->deleteId = null;

            $this->dispatch('toastr:success', message: 'Report deleted successfully.');
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function getReportsProperty()
    {
        $query = Report::with(['patient', 'investigation', 'bill'])
            ->where('patient_id', $this->patientId)
            ->latest();

        if ($this->invoiceSearch) {
            $query->whereHas('bill', function ($q) {
                $q->where('invoice_number', 'like', "%{$this->invoiceSearch}%");
            });
        }

        if ($this->dateSearch) {
            $query->whereDate('created_at', $this->dateSearch);
        }

        return $query->paginate(50);
    }

    public function render()
    {
        $reports = $this->reports;

        $this->patientName = $reports->first()->patient->name ?? 'N/A';
        $this->patientPhone = $reports->first()->patient->phone ?? 'N/A';
        $this->patientAge = $reports->first()->patient->full_age ?? 'N/A';

        return view('livewire.backend.delivery.patient-reports', [
            'reports' => $reports,
            'groupedReports' => $reports->groupBy(fn($r) => $r->bill->invoice_number ?? 'N/A')
        ])->layout('backend.template.body');
    }
}
