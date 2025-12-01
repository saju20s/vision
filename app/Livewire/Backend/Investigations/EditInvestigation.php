<?php

namespace App\Livewire\Backend\Investigations;

use App\Models\Investigation;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EditInvestigation extends Component
{
    public $investigationId;
    public $test_name, $department, $sell_price;

    public function mount($id)
    {
        $investigation = Investigation::findOrFail($id);

        $this->investigationId = $investigation->id;
        $this->test_name = $investigation->test_name;
        $this->department = $investigation->department;
        $this->sell_price = $investigation->sell_price;
    }

    public function update()
    {
        try {
            $this->validate([
                'test_name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('investigations', 'test_name')->ignore($this->investigationId),
                ],
                'department'  => 'required|string|max:255',
                'sell_price'  => 'required|numeric|min:0',
            ]);

            $investigation = Investigation::findOrFail($this->investigationId);

            $investigation->test_name = $this->test_name;
            $investigation->department = $this->department;
            $investigation->sell_price = $this->sell_price;
            $investigation->save();

            $this->dispatch('toastr:success', message: 'Investigation updated successfully.');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.backend.investigations.edit-investigation')->layout('backend.template.body');
    }
}
