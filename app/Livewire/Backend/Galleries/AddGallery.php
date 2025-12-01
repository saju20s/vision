<?php

namespace App\Livewire\Backend\Galleries;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddGallery extends Component
{
    use WithFileUploads;

    public $title;
    public $type = 'gallery';
    public $image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'type' => 'required|string',
        'image' => 'required|image|max:1024'
    ];

    public function store()
    {
        try {
            $validated = $this->validate();


            $imageName = $this->image->store('sliders', 'public');

            Slider::create([
                'title' => $validated['title'],
                'type' => $this->type,
                'image' => $imageName,
            ]);

            $this->reset();

            $this->dispatch('toastr:success', message: 'Gallery created successfully.');
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
        return view('livewire.backend.galleries.add-gallery')
            ->layout('backend.template.body');
    }
}
