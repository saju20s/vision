<?php

namespace App\Livewire\Backend\Departments;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddDepartment extends Component
{
    use WithFileUploads;

    public $title;
    public $icon;
    public $color;
    public $image;
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
        'image' => 'required|image|max:1024',
    ];

    public function selectIcon($iconClass)
    {
        $this->icon = $iconClass;
    }

    public function store()
    {
        try {
            // Validate inputs
            $validated = $this->validate();

            // Upload image
            $imageName = $this->image->store('blogs', 'public');

            // Save blog
            Department::create([
                'title' => $this->title,
                'description' => $this->description,
                'icon' => $this->icon,
                'color' => $this->color,
                'image' => $imageName,
            ]);

            $this->reset();

            $this->dispatch('toastr:success', message: 'Department created successfully.');
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
        return view('livewire.backend.departments.add-department')->layout('backend.template.body');
    }
}
