<?php

namespace App\Livewire\Backend\Blogs;

use App\Models\Blog;
use App\Models\BolgCategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class AddBlog extends Component
{
    use WithFileUploads;

    public $title;
    public $description = '';
    public $image;
    public $category_id;
    public $categories = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|max:1024',
        'category_id' => 'required|exists:bolg_categories,id',
    ];

    public function mount()
    {
        $this->categories = BolgCategory::orderBy('name')->get();
    }

    public function store()
    {
        try {
            // Validate inputs
            $validated = $this->validate();

            // Upload image
            $imageName = $this->image->store('blogs', 'public');

            // Save blog
            Blog::create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'description' => $validated['description'],
                'image' => $imageName,
                'blog_category_id' => $validated['category_id'],
                'author_name' => auth()->user()->name,
            ]);

            $this->reset();

            $this->dispatch('toastr:success', message: 'Blog created successfully.');
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
        return view('livewire.backend.blogs.add-blog')->layout('backend.template.body');
    }
}
