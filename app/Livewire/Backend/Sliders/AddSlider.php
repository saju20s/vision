<?php

namespace App\Livewire\Backend\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddSlider extends Component
{
    use WithFileUploads;

    public $title;
    public $type = 'home';
    public $image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'type' => 'required|string',
        'image' => 'required|image|max:1024'
    ];

    public function store()
    {

        try {
            // Validate data
            $this->validate();

            // Upload image
            $imageName = $this->image->store('sliders', 'public');

            // Create page
            Slider::create([
                'title' => $this->title,
                'type' => $this->type,
                'image' => $imageName,
            ]);

            // Reset form inputs
            $this->reset();

            $this->dispatch('toastr:success', message: 'Slider Created successfully.');
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
        return view('livewire.backend.sliders.add-slider')->layout('backend.template.body');
    }
}
