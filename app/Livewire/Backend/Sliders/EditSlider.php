<?php

namespace App\Livewire\Backend\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditSlider extends Component
{

    use WithFileUploads;

    public $sliderId;
    public $title;
    public $type;
    public $image;
    public $oldImage;

    public function mount($id)
    {
        $slider = Slider::findOrFail($id);

        $this->sliderId = $slider->id;
        $this->title = $slider->title;
        $this->type = $slider->type;
        $this->oldImage = $slider->image;
    }

    public function update()
    {
        try {
            $this->validate([
                'title' => 'required|string|max:255',
                'type' => 'required|string',
                'image' => 'nullable|image|max:2048',
            ]);

            $slider = Slider::findOrFail($this->sliderId);

            // Notun image dile puraton ta delete korte hobe
            if ($this->image) {
                // Puraton image er thik path check
                if ($this->oldImage && file_exists(public_path('storage/' . $this->oldImage))) {
                    unlink(public_path('storage/' . $this->oldImage)); // delete
                }

                // Notun image save
                $imageName = Str::slug($this->title) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('sliders', $imageName, 'public');
                $slider->image = 'sliders/' . $imageName;
            }

            // Onno field gulo update
            $slider->title = $this->title;
            $slider->type = $this->type;
            $slider->save();

            // Success message
            $this->dispatch('toastr:success', message: 'Slider updated successfully.');
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
        return view('livewire.backend.sliders.edit-slider')->layout('backend.template.body');
    }
}
