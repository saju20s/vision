<?php

namespace App\Livewire\Backend\Commenders;

use Livewire\Component;
use App\Models\Commander;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditCommender extends Component
{
    use WithFileUploads;

    public $commanderId;
    public $name;
    public $designation;
    public $address;
    public $message = '';
    public $image;
    public $oldImage;

    public function mount($id)
    {
        $commander = Commander::findOrFail($id);

        $this->commanderId = $commander->id;
        $this->name = $commander->name;
        $this->designation = $commander->designation;
        $this->address = $commander->address;
        $this->message = $commander->message;
        $this->oldImage = $commander->image;
    }

    public function update()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'message' => 'nullable|string',
                'image' => 'nullable|image|max:2048',
            ]);

            $commander = Commander::findOrFail($this->commanderId);

            // If new image uploaded
            if ($this->image) {
                if ($this->oldImage && file_exists(public_path('storage/' . $this->oldImage))) {
                    unlink(public_path('storage/' . $this->oldImage));
                }

                $imageName = Str::slug($this->name) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('commanders', $imageName, 'public');
                $commander->image = 'commanders/' . $imageName;
            }

            $commander->update([
                'name' => $this->name,
                'designation' => $this->designation,
                'address' => $this->address,
                'message' => $this->message,
            ]);

            $this->dispatch('toastr:success', message: 'Commander updated successfully.');
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
        return view('livewire.backend.commenders.edit-commender')
            ->layout('backend.template.body');
    }
}
