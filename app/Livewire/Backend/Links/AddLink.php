<?php

namespace App\Livewire\Backend\Links;

use App\Models\Link;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddLink extends Component
{
    use WithFileUploads;

    public $title;
    public $link;
    public $position = 'left';
    public $image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'link' => 'required|string',
        'position' => 'required|string|max:255',
        'image' => 'required|image|max:1024',
    ];

    public function store()
    {
        // Validate data
        try {
            $validated = $this->validate();

            // Upload image
            $imageName = $this->image->store('links', 'public');

            // Create Link
            Link::create([
                'title' => $validated['title'],
                'link' => $validated['link'],
                'position' => $validated['position'],
                'image' => $imageName,
            ]);

            // Reset form inputs
            $this->reset();

            // Toastr success message
            $this->dispatch('toastr:success', message: 'Link Created successfully.');
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
        return view('livewire.backend.links.add-link')->layout('backend.template.body');
    }
}
