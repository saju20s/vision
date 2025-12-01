<?php

namespace App\Livewire\Backend\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $course = Course::findOrFail($this->deleteId);

        // Delete image file if exists
        if ($course->image && file_exists(public_path('storage/' . $course->image))) {
            unlink(public_path('storage/' . $course->image));
        }

        $course->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Course deleted successfully.');
    }

    public function render()
    {
        $courses = Course::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(10);

        return view('livewire.backend.courses.courses', [
            'datas' => $courses,
        ])->layout('backend.template.body');
    }
}
