<?php

namespace App\Livewire\Backend\Courses;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class EditCourse extends Component
{
    use WithFileUploads;

    public $courseId;
    public $title;
    public $slug;
    public $description = '';
    public $image;
    public $oldImage;

    public function mount($id)
    {
        $course = Course::findOrFail($id);

        $this->courseId = $course->id;
        $this->title = $course->title;
        $this->slug = $course->slug;
        $this->description = $course->description;
        $this->oldImage = $course->image;
    }

    public function update()
    {
        try {
            $this->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|max:2048',
            ]);


            $course = Course::findOrFail($this->courseId);

            if ($this->image) {
                if ($this->oldImage && File::exists(public_path('storage/' . $this->oldImage))) {
                    File::delete(public_path('storage/' . $this->oldImage));
                }

                $imageName = Str::slug($this->title) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('courses', $imageName, 'public');
                $course->image = 'courses/' . $imageName;
            }

            $course->title = $this->title;
            $course->slug = $this->slug;
            $course->description = $this->description;
            $course->save();

            $this->dispatch('toastr:success', message: 'Course updated successfully.');
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
        return view('livewire.backend.courses.edit-course')
            ->layout('backend.template.body');
    }
}
