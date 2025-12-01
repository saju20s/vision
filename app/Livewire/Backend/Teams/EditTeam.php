<?php

namespace App\Livewire\Backend\Teams;

use App\Models\Team;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditTeam extends Component
{
    use WithFileUploads;

    public $teamId;
    public $name;
    public $designation;
    public $phone;
    public $email;
    public $reg_id;
    public $image;
    public $oldImage;

    public function mount($id)
    {
        $team = Team::findOrFail($id);

        $this->teamId = $team->id;
        $this->name = $team->name;
        $this->designation = $team->designation;
        $this->phone = $team->phone;
        $this->email = $team->email;
        $this->reg_id = $team->reg_id;
        $this->oldImage = $team->image;
    }

    public function update()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'reg_id' => 'required|string|max:255',
                'image' => 'nullable|image|max:1024',
            ]);

            $team = Team::findOrFail($this->teamId);

            // Notun image dile puraton ta delete korte hobe
            if ($this->image) {
                // Puraton image er thik path check
                if ($this->oldImage && file_exists(public_path('storage/' . $this->oldImage))) {
                    unlink(public_path('storage/' . $this->oldImage));
                }


                // Notun image save
                $imageName = Str::slug($this->name) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('teams', $imageName, 'public');
                $team->image = 'teams/' . $imageName;
            }

            // Onno field gulo update
            $team->name = $this->name;
            $team->designation = $this->designation;
            $team->phone = $this->phone;
            $team->email = $this->email;
            $team->reg_id = $this->reg_id;
            $team->save();

            // Success message
            $this->dispatch('toastr:success', message: 'Team updated successfully.');
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
        return view('livewire.backend.teams.edit-team')->layout('backend.template.body');
    }
}
