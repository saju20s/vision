<?php

namespace App\Livewire\Backend\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AddPage extends Component
{
    use WithFileUploads;

    public $title;
    public $description = '';
    public $image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|max:1024',
    ];

    public function store()
    {
        try {

            $this->validate();

            // Upload image
            $imageName = $this->image->store('pages', 'public');

            // Create page
            Page::create([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'description' => $this->description,
                'image' => $imageName,
            ]);

            // Reset form inputs
            $this->reset();

            $this->dispatch('toastr:success', message: 'Page created successfully.');
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
        return view('livewire.backend.pages.add-page')->layout('backend.template.body');
    }
}
