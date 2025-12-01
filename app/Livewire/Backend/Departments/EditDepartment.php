<?php

namespace App\Livewire\Backend\Departments;

use Livewire\Component;
use App\Models\Department;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditDepartment extends Component
{
    use WithFileUploads;
    
    public $departmentId;
    public $title;
    public $icon;
    public $color;
    public $image;
    public $oldImage;
    public $description = '';

    public $icons = [
        "fas fa-heartbeat",
        "fas fa-vials",
        "fas fa-wave-square",
        "fas fa-x-ray",
        "fas fa-stethoscope",
        "fas fa-pills",
        "fas fa-band-aid",
        "fas fa-syringe",
        "fas fa-medkit",
        "fas fa-dna",
        "fas fa-hospital",
        "fas fa-user-md",
        "fas fa-ambulance",
        "fas fa-heart",
        "fas fa-biohazard",
        "fas fa-virus",
        "fas fa-brain",
        "fas fa-hand-holding-medical",
        "fas fa-lungs",
        "fas fa-bone",
        "fas fa-tooth",
    ];

    protected $rules = [
        'title' => 'required|string|max:255',
        'icon' => 'required|string|max:255',
        'color' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount($id)
    {
        $department = Department::findOrFail($id);

        $this->departmentId = $department->id;
        $this->title = $department->title;
        $this->icon = $department->icon;
        $this->color = $department->color;
        $this->description = $department->description;
        $this->oldImage = $department->image;
    }

    public function selectIcon($iconClass)
    {
        $this->icon = $iconClass;
        $this->dispatch('close-modal', id: 'iconPickerModal');
    }

    public function update()
    {
        try {
            $validated = $this->validate();

            $department = Department::findOrFail($this->departmentId);

            if ($this->image) {
                // Delete old image if exists
                if ($this->oldImage && file_exists(public_path('storage/' . $this->oldImage))) {
                    unlink(public_path('storage/' . $this->oldImage));
                }

                $imageName = Str::slug($this->title) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('blogs', $imageName, 'public');
                $department->image = 'blogs/' . $imageName;
            }

            $department->update([
                'title' => $this->title,
                'description' => $this->description,
                'icon' => $this->icon,
                'color' => $this->color,
            ]);

            $this->dispatch('toastr:success', message: 'Department updated successfully.');
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
        return view('livewire.backend.departments.edit-department')->layout('backend.template.body');
    }
}
