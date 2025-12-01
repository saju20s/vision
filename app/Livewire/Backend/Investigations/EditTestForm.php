<?php

namespace App\Livewire\Backend\Investigations;

use Livewire\Component;
use App\Models\Investigation;
use Illuminate\Validation\ValidationException;

class EditTestForm extends Component
{
    public $investigationId;
    public $testForms = [];
    public $xrayForm = [
        'finding' => '',
        'comment' => '',
    ];
    public $usgForm = [];
    public $usgFormImpression = '';
    public $test_category_name;

    public function mount($id)
    {
        $investigation = Investigation::findOrFail($id);

        $this->investigationId = $investigation->id;
        $this->test_category_name = $investigation->test_category_name;
        $this->testForms = $investigation->test_form ?? [
            ['parameter_name' => '', 'result' => '', 'normal_value' => '', 'unit' => '']
        ];
        $this->xrayForm = $investigation->xray_form ?? [
            'finding' => '',
            'comment' => '',
        ];
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

            $investigation = Investigation::findOrFail($this->investigationId);
            $investigation->test_form = $this->testForms;
            $investigation->xray_form = $this->xrayForm;
            $investigation->usg_form = [
                'parameters' => $this->usgForm,
                'impression' => $this->usgFormImpression,
            ];
            $investigation->test_category_name = $this->test_category_name;
            $investigation->save();

            $this->dispatch('toastr:success', message: 'Investigation form updated successfully');
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
        $investigation = Investigation::find($this->investigationId);
        return view('livewire.backend.investigations.edit-test-form', compact('investigation'))
            ->layout('backend.template.body');
    }
}
