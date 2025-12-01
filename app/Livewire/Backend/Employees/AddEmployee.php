<?php

namespace App\Livewire\Backend\Employees;

use App\Models\Patient;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AddEmployee extends Component
{
    use WithFileUploads;

    public $name, $gender = 'male', $type = 'employee',$age, $phone, $address, $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'age' => 'nullable|integer|min:0|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'image' => 'required|image|max:1024',
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

            // Generate unique patient_id
            $yearShort = now()->format('y'); // যেমন: 25, 26
            $lastPatient = Patient::where('patient_id', 'like', "H{$yearShort}-%")
                ->orderBy('patient_id', 'desc')
                ->first();

            if ($lastPatient) {
                // get last sequence number
                $lastSeq = (int)substr($lastPatient->patient_id, 4);
                $newSeq = str_pad($lastSeq + 1, 6, '0', STR_PAD_LEFT);
            } else {
                $newSeq = '000001';
            }

            $patient_id = "H{$yearShort}-{$newSeq}";

            // Upload image
            $imageName = $this->image->store('patients', 'public');

            // Save patient
            Patient::create([
                'patient_id'    => $patient_id,
                'name'          => $this->name,
                'gender'        => $this->gender,
                'date_of_birth' => $date_of_birth,
                'phone'         => $this->phone,
                'address'       => $this->address,
                'type'          => $this->type,
                'image'         => $imageName,
            ]);

            $this->reset();

            $this->dispatch('toastr:success', message: 'Employee created successfully.');
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
        return view('livewire.backend.employees.add-employee')->layout('backend.template.body');
    }
}
