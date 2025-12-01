<?php

namespace App\Livewire\Backend\Commenders;

use App\Models\Commander;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddCommender extends Component
{
    use WithFileUploads;

    public $name;
    public $designation;
    public $address;
    public $message = '';
    public $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'message' => 'required|string',
        'image' => 'required|image|max:1024',
    ];

    public function store()
    {
        try {
            // Validate data
            $validated = $this->validate();

            // Upload image
            $imageName = $this->image->store('commanders', 'public');

            // Create Commander record
            Commander::create([
                'name' => $validated['name'],
                'designation' => $validated['designation'],
                'address' => $validated['address'],
                'message' => $validated['message'],
                'image' => $imageName,
            ]);

            // Reset form inputs
            $this->reset();

            // Show success message using Toastr
            $this->dispatch('toastr:success', message: 'Commander created successfully.');
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
        return view('livewire.backend.commenders.add-commender')->layout('backend.template.body');
    }
}
