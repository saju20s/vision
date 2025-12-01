<?php

namespace App\Livewire\Backend\Doctors;

use App\Models\Doctor;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddDoctor extends Component
{
    use WithFileUploads;

    public $name, $gender = 'male', $age, $phone, $specialization, $qualification, $designation, $image;

    protected $rules = [
        'name'            => 'required|string|max:255',
        'gender'          => 'nullable|in:male,female',
        'age'             => 'nullable|integer|min:0|max:255',
        'image'           => 'nullable|image|max:1024', // 1MB
        'phone'           => 'nullable|string|max:20',
        'specialization'  => 'nullable|string|max:255',
        'qualification'   => 'nullable|string|max:255',
        'designation'     => 'nullable|string|max:255',
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

            // Upload image
            $imageName = null;
            if ($this->image) {
                $imageName = $this->image->store('doctors', 'public');
            }

            // Save 
            Doctor::create([
                'name' => $this->name,
                'gender' => $this->gender,
                'date_of_birth' => $date_of_birth,
                'phone' => $this->phone,
                'specialization' => $this->specialization,
                'qualification' => $this->qualification,
                'designation' => $this->designation,
                'image' => $imageName,
            ]);

            $this->reset();

            $this->dispatch('toastr:success', message: 'Doctor created successfully.');
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
        return view('livewire.backend.doctors.add-doctor')->layout('backend.template.body');
    }
}
