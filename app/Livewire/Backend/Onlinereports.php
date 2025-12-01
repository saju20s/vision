<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Report; // আপনার report model

class Onlinereports extends Component
{
    public $bill;
    public $reports = [];
    public $hasDue = false;
    public $selectedReport = null;

    public function mount($billid, $patientid)
    {
        // Bill খুঁজে বের করা
        $this->bill = Bill::with('patient') // যদি relation থাকে
            ->where('id', $billid)
            ->where('patient_id', $patientid)
            ->first();

        if (!$this->bill) {
            abort(404, 'Bill not found');
        }

        // Due আছে কি না চেক
        if ($this->bill->due_amount > 0) {
            $this->hasDue = true;
            return;
        }

        // Reports বের করা
        $this->reports = Report::where('bill_id', $billid)
            ->where('patient_id', $patientid)
            ->get();
    }

    public function showReport($reportId)
    {
        $this->selectedReport = Report::find($reportId);
    }
    

    public function render()
    {
        return view('livewire.backend.onlinereports', [
            'bill' => $this->bill,
            'reports' => $this->reports,
            'hasDue' => $this->hasDue,
            'selectedReport' => $this->selectedReport,
        ])->layout('backend.template.body');
    }
}
