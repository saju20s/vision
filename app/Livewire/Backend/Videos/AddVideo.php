<?php

namespace App\Livewire\Backend\Videos;

use App\Models\Video;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class AddVideo extends Component
{
    public $title;
    public $link;

    protected $rules = [
        'title' => 'required|string|max:255',
        'link' => 'required|string|max:255'
    ];

    public function store()
    {
        try {
            // Validate data
            $validated = $this->validate();


            // Create page
            Video::create([
                'title' => $validated['title'],
                'link' => $validated['link'],
            ]);

            // Reset form inputs
            $this->reset();

            $this->dispatch('toastr:success', message: 'Video created successfully.');
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
        return view('livewire.backend.videos.add-video')->layout('backend.template.body');
    }
}
