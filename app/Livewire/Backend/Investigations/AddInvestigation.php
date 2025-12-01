<?php

namespace App\Livewire\Backend\Investigations;

use Livewire\Component;
use App\Models\Investigation;
use Illuminate\Validation\ValidationException;

class AddInvestigation extends Component
{
    public $test_name, $department, $sell_price;

    protected $rules = [
        'test_name'   => 'required|string|max:255|unique:investigations,test_name',
        'department'  => 'required|string|max:255',
        'sell_price'  => 'required|numeric|min:0',
    ];


    public function store()
    {
        try {
            // Validate inputs
            $validated = $this->validate();

            // Save 
            Investigation::create([
                'test_name' => $this->test_name,
                'department' => $this->department,
                'sell_price' => $this->sell_price,
            ]);

            $this->reset();

            $this->dispatch('toastr:success', message: 'Investigation created successfully.');
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
        return view('livewire.backend.investigations.add-investigation')->layout('backend.template.body');
    }
}
