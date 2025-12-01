<?php

namespace App\Livewire\Backend\Teams;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddTeam extends Component
{

    use WithFileUploads;

    public $name;
    public $designation;
    public $phone;
    public $email;
    public $reg_id;
    public $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'reg_id' => 'required|string|max:255',
        'image' => 'required|image|max:1024',
    ];

    public function store()
    {
        try {
            // Validate data
            $validated = $this->validate();

            // Upload image
            $imageName = $this->image->store('teams', 'public');

            // Create team
            Team::create([
                'name' => $validated['name'],
                'designation' => $validated['designation'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'reg_id' => $validated['reg_id'],
                'image' => $imageName,
            ]);

            // Reset form inputs
            $this->reset();

            $this->dispatch('toastr:success', message: 'Team Created successfully.');
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
        return view('livewire.backend.teams.add-team')->layout('backend.template.body');
    }
}
