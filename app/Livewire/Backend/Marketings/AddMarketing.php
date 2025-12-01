<?php

namespace App\Livewire\Backend\Marketings;

use App\Models\Marketing;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddMarketing extends Component
{
    use WithFileUploads;

    public $name, $gender = 'male', $age, $phone, $address, $image, $type ='owner';

    protected $rules = [
        'name'            => 'required|string|max:255',
        'gender'          => 'nullable|in:male,female',
        'age'             => 'nullable|integer|min:0|max:255',
        'image'           => 'nullable|image|max:1024',
        'phone'           => 'nullable|string|max:20',
        'address'           => 'nullable|string|max:255',
        'type' => 'required|string|in:owner,mark',
    ];

    public function store()
    {
        try {
            // Validate inputs
            $validated = $this->validate();

            $date_of_birth = $this->age
                ? Carbon::create(
                    now()->year - $this->age,
                    1,
                    1
                )->toDateString()
                : null;

            // Upload image only if uploaded
            $imageName = null;
            if ($this->image) {
                $imageName = $this->image->store('marketings', 'public');
            }

            // Save 
            Marketing::create([
                'name' => $this->name,
                'gender' => $this->gender,
                'date_of_birth' => $date_of_birth,
                'phone' => $this->phone,
                'address' => $this->address,
                'type' => $this->type,
                'image' => $imageName,
            ]);

            $this->reset();

            $this->dispatch('toastr:success', message: 'Marketing created successfully.');
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
        return view('livewire.backend.marketings.add-marketing')->layout('backend.template.body');
    }
}
