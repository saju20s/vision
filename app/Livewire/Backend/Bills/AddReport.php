<?php

namespace App\Livewire\Backend\Bills;

use App\Models\Bill;
use App\Models\Report;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Billitem;
use App\Models\Investigation;
use Illuminate\Support\Facades\Auth;

class AddReport extends Component
{
    public $bill_id;
    public $patient_id;
    public $investigations = [];
    public $highlightedInvestigationId;
    public $expandedInvestigations = [];
    public $patient;

    public function mount($id, $highlighted_investigation = null)
    {
        $this->bill_id = $id;
        $this->highlightedInvestigationId = $highlighted_investigation;

        $bill = Bill::findOrFail($this->bill_id);
        $this->patient_id = $bill->patient_id;

        $investigationIds = Billitem::where('bill_id', $this->bill_id)
            ->pluck('investigation_id')
            ->unique();

        $query = Investigation::whereIn('id', $investigationIds)
            ->whereNotIn('department', ['accessories', 'surgery_charge']);


        $userRoles = Auth::user()->getRoleNames()->toArray();

        if (!empty($userRoles) && !in_array('Master Admin', $userRoles)) {
            $query->whereIn('department', $userRoles);
        }


        $investigations = $query->get();

        $reports = Report::where('bill_id', $this->bill_id)
            ->pluck('id', 'investigation_id')
            ->toArray();

        $this->investigations = $investigations->map(function ($inv) use ($reports) {
            $inv->bill_id = $this->bill_id;
            $inv->patient_id = $this->patient_id;
            $inv->has_report = isset($reports[$inv->id]);
            return $inv;
        });

        $this->patient = Patient::find($this->patient_id);

        $bill->checkAndUpdateStatus();
    }

    public function sendSms()
    {
        try {
            $patient = Patient::findOrFail($this->patient_id);

            if (!$patient->phone) {
                $this->dispatch('toastr:error', message: 'Patient phone number not found.');
                return;
            }

            $salutation = $patient->gender === 'male' ? 'স্যার' : 'ম্যাডাম';
            $message = "শ্রদ্ধেয় {$patient->name} {$salutation},আপনার রিপোর্ট প্রস্তুত হয়েছে। অনুগ্রহ করে Matriseba Hospital এর সাথে যোগাযোগ করুন। অথবা নিচের লিঙ্কে ক্লিক করে আপনার রিপোর্ট দেখুন: "
                . url("download-reports/{$this->bill_id}/{$patient->id}");

            $number = $patient->phone;

            // যদি 0 দিয়ে শুরু হয়, 880 দিয়ে replace করুন
            if (substr($number, 0, 1) === "0") {
                $number = "88" . $number;
            }


            $response = sms_send($number, $message);

            $this->dispatch('toastr:success', message: 'SMS sent successfully!');
            $this->redirect(route('add.report', ['id' => $this->bill_id]), navigate: true);
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }




    public function render()
    {
        return view('livewire.backend.bills.add-report', [
            'investigations' => $this->investigations,
            'patient' => $this->patient,
        ])->layout('backend.template.body');
    }
}
