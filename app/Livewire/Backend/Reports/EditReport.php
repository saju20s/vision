<?php

namespace App\Livewire\Backend\Reports;

use App\Models\Bill;
use App\Models\Report;
use App\Models\Setting;
use App\Models\Investigation;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class EditReport extends Component
{
    public $investigationId;
    public $delivered = 1;
    public $billId;
    public $testForms = [];
    public $xrayForm = [
        'finding' => '',
        'comment' => '',
    ];
    public $usgForm = [];
    public $usgFormImpression = '';
    public $test_category_name;
    public $department;

    public $searchInvestigation = ''; // search input
    public $investigationList = [];   // search result list
    public $selectedInvestigation;

    public function mount($id = null, $bill_id = null)
    {
        $this->billId = $bill_id;

        if ($id) {
            $this->setInvestigation($id);
        }
    }

    public function searchInvestigations()
    {
        $this->investigationList = Investigation::where('test_name', 'like', '%' . $this->searchInvestigation . '%')
            ->orderBy('test_name')
            ->get()
            ->toArray();
    }

    public function setInvestigation($id)
    {
        $this->investigationId = $id;
        $investigation = Investigation::findOrFail($id);

        $this->test_category_name = $investigation->test_category_name;
        $this->department = $investigation->department;

        if ($this->department === 'laboratory') {
            // যদি test_form থাকে তবে merge করবো
            if (!empty($investigation->test_form)) {
                $this->testForms = array_merge($this->testForms, $investigation->test_form);
            } else if (empty($this->testForms)) {
                $this->testForms = [
                    ['parameter_name' => '', 'result' => '', 'normal_value' => '', 'unit' => '']
                ];
            }
        }

        if ($this->department === 'radiology') {
            $this->xrayForm = $investigation->xray_form ?? [
                'finding' => '',
                'comment' => '',
            ];
        }

        if ($this->department === 'ultrasonography') {
            $usgForm = $investigation->usg_form ?? null;
            if (is_array($usgForm) && isset($usgForm['parameters'])) {
                $this->usgForm = $usgForm['parameters'];
                $this->usgFormImpression = $usgForm['impression'] ?? '';
            } else {
                $this->usgForm = [
                    ['parameter_name' => '', 'result' => '']
                ];
                $this->usgFormImpression = '';
            }
        }

        $this->selectedInvestigation = $investigation;
        $this->investigationList = []; // search result hide
    }


    public function addFormField()
    {
        $this->testForms[] = ['parameter_name' => '', 'result' => '', 'normal_value' => '', 'unit' => ''];
    }

    public function removeFormField($index)
    {
        unset($this->testForms[$index]);
        $this->testForms = array_values($this->testForms);
    }

    public function addUSGFormField()
    {
        $this->usgForm[] = ['parameter_name' => '', 'result' => ''];
    }

    public function removeUSGFormField($index)
    {
        unset($this->usgForm[$index]);
        $this->usgForm = array_values($this->usgForm);
    }

    public function update()
    {
        try {

            $bill = Bill::findOrFail($this->billId);
            $setting = Setting::find(1);
            $preparedBy = $setting?->prepared_by ?? null;
            $authorizedBy = $setting?->authorized_by ?? null;
            $usgSignature = $setting?->usg_signature ?? null;
            $radiologySignature = $setting?->report_signature ?? null;

            $signatureData = [
                'prepared_by' => null,
                'authorized_by' => null,
                'usg_signature' => null,
                'report_signature' => null,
            ];

            if ($this->department === 'laboratory') {
                $signatureData['prepared_by'] = $preparedBy;
                $signatureData['authorized_by'] = $authorizedBy;
            } elseif ($this->department === 'radiology') {
                $signatureData['report_signature'] = $radiologySignature;
            } elseif ($this->department === 'ultrasonography') {
                $signatureData['usg_signature'] = $usgSignature;
            }


            Report::create([
                'bill_id' => $this->billId,
                'investigation_id' => $this->investigationId,
                'patient_id' => $bill->patient_id,
                'test_form' => $this->department === 'laboratory' ? $this->testForms : null,
                'xray_form' => $this->department === 'radiology' ? $this->xrayForm : null,
                'usg_form' => $this->department === 'ultrasonography' ? [
                    'parameters' => $this->usgForm,
                    'impression' => $this->usgFormImpression,
                ] : null,
                'test_category_name' => $this->test_category_name,
                'delivered' => $this->delivered,
                'prepared_by' => $signatureData['prepared_by'],
                'authorized_by' => $signatureData['authorized_by'],
                'usg_signature' => $signatureData['usg_signature'],
                'report_signature' => $signatureData['report_signature'],
            ]);

            $this->dispatch('toastr:success', message: 'Report created successfully');
            $this->redirect(route('add.report', ['id' => $this->billId]), navigate: true);
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function reorderTestForms($order)
    {
        $this->testForms = collect($order)->map(function ($index) {
            return $this->testForms[$index];
        })->values()->toArray();
    }

    public function reorderUSGForm($order)
    {
        $this->usgForm = collect($order)->map(function ($index) {
            return $this->usgForm[$index];
        })->values()->toArray();
    }



    public function render()
    {
        return view('livewire.backend.reports.edit-report')->layout('backend.template.body');
    }
}
