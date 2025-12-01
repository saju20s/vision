<?php

namespace App\Livewire\Backend\Patients;

use Carbon\Carbon;
use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditPatient extends Component
{
    use WithFileUploads;

    public $patientId;
    public $name, $gender, $age, $phone, $address, $type;
    public $image;
    public $oldImage;
    public $note = '';

    public function mount($id)
    {
        $patient = Patient::findOrFail($id);

        $this->patientId = $patient->id;
        $this->name = $patient->name;
        $this->gender = $patient->gender;
        $this->age = $patient->age;
        $this->phone = $patient->phone;
        $this->address = $patient->address;
        $this->type = $patient->type;
        $this->oldImage = $patient->image;
        $this->note = $patient->note;
    }

    public function update()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'age' => 'nullable|integer|min:0|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string',
                'type' => 'required|string|in:patient,employee',
                'image' => 'nullable|image|max:1024',
                'note' => 'nullable',
            ]);

            $patient = Patient::findOrFail($this->patientId);

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
                $this->image->storeAs('patients', $imageName, 'public');
                $patient->image = 'patients/' . $imageName;
            }

            $patient->name = $this->name;
            $patient->gender = $this->gender;
            $patient->date_of_birth = $date_of_birth;
            $patient->phone = $this->phone;
            $patient->address = $this->address;
            $patient->type = $this->type;
            $patient->note = $this->note;
            $patient->save();

            $this->dispatch('toastr:success', message: 'Patient updated successfully.');
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
        return view('livewire.backend.patients.edit-patient')->layout('backend.template.body');
    }
}
