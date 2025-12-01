<?php

namespace App\Livewire\Backend\Marketings;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Marketing;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditMarketing extends Component
{

    use WithFileUploads;

    public $name, $gender = 'male', $age, $phone, $address, $image;
    public $marketingId;
    public $oldImage;
    public $type;

    public function mount($id)
    {
        $marketing = Marketing::findOrFail($id);

        $this->marketingId = $marketing->id;
        $this->name = $marketing->name;
        $this->gender = $marketing->gender;
        $this->age = $marketing->age;
        $this->phone = $marketing->phone;
        $this->address = $marketing->address;
        $this->type = $marketing->type;
        $this->oldImage = $marketing->image;
    }

    public function update()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'age' => 'nullable|integer|min:0|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:255',
                'image' => 'nullable|image|max:1024',
                'type' => 'required|string|in:owner,mark',
            ]);

            $marketing = Marketing::findOrFail($this->marketingId);

            $date_of_birth = $this->age
                ? Carbon::create(
                    now()->year - $this->age,
                    1,
                    1
                )->toDateString()
                : null;

            // If new image is uploaded
            if ($this->image) {
                // Delete old image if exists
                if ($this->oldImage && file_exists(public_path('storage/' . $this->oldImage))) {
                    unlink(public_path('storage/' . $this->oldImage));
                }

                $imageName = Str::slug($this->name) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('marketings', $imageName, 'public');
                $marketing->image = 'marketings/' . $imageName;
            }

            $marketing->name = $this->name;
            $marketing->gender = $this->gender;
            $marketing->date_of_birth = $date_of_birth;
            $marketing->phone = $this->phone;
            $marketing->address = $this->address;
            $marketing->type = $this->type;
            $marketing->save();

            $this->dispatch('toastr:success', message: 'Marketing updated successfully.');
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
        return view('livewire.backend.marketings.edit-marketing')->layout('backend.template.body');
    }
}
