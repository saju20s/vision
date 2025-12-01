<?php

namespace App\Livewire\Backend\Courses;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddCourse extends Component
{
    use WithFileUploads;

    public $title;
    public $description = '';
    public $image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|max:2048',
    ];

    public function store()
    {
        try {
            $validated = $this->validate();

            $imageName = $this->image->store('courses', 'public');

            Course::create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'description' => $validated['description'],
                'image' => $imageName,
            ]);

            $this->reset();

            $this->dispatch('toastr:success', message: 'Course created successfully.');
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
        return view('livewire.backend.courses.add-course')->layout('backend.template.body');
    }
}
