<?php

namespace App\Livewire\Backend\Doctors;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EditDoctor extends Component
{
    use WithFileUploads;

    public $doctorId, $name, $gender = 'male', $age, $phone, $specialization, $qualification, $designation, $image;
    public $oldImage;
    public $note = '';

    public function mount($id)
    {
        $doctor = Doctor::findOrFail($id);

        $this->doctorId = $doctor->id;
        $this->name = $doctor->name;
        $this->gender = $doctor->gender;
        $this->age = $doctor->date_of_birth ? now()->year - Carbon::parse($doctor->date_of_birth)->year : null;
        $this->phone = $doctor->phone;
        $this->specialization = $doctor->specialization;
        $this->qualification = $doctor->qualification;
        $this->designation = $doctor->designation;
        $this->oldImage = $doctor->image;
        $this->note = $doctor->note;
    }

    public function update()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'gender' => 'required|in:male,female',
                'age' => 'nullable|integer|min:0|max:255',
                'phone' => 'nullable|string|max:20',
                'specialization' => 'nullable|string|max:255',
                'qualification' => 'nullable|string|max:255',
                'designation' => 'nullable|string|max:255',
                'image' => 'nullable|image|max:1024',
                'note' => 'nullable',
            ]);

            $doctor = Doctor::findOrFail($this->doctorId);

            $date_of_birth = $this->age
                ? Carbon::create(now()->year - $this->age, 1, 1)->toDateString()
                : null;

            // Handle new image
            if ($this->image) {
                if ($this->oldImage && file_exists(public_path('storage/' . $this->oldImage))) {
                    unlink(public_path('storage/' . $this->oldImage));
                }

                $imageName = Str::slug($this->name) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('doctors', $imageName, 'public');
                $doctor->image = 'doctors/' . $imageName;
            }

            $doctor->update([
                'name' => $this->name,
                'gender' => $this->gender,
                'date_of_birth' => $date_of_birth,
                'phone' => $this->phone,
                'specialization' => $this->specialization,
                'qualification' => $this->qualification,
                'designation' => $this->designation,
                'note' => $this->note
            ]);

            $this->dispatch('toastr:success', message: 'Doctor updated successfully.');
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
        return view('livewire.backend.doctors.edit-doctor')->layout('backend.template.body');
    }
}
