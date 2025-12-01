<?php

namespace App\Livewire\Backend\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\BolgCategory;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class EditBlog extends Component
{
    use WithFileUploads;

    public $blogId;
    public $title;
    public $slug;
    public $description = '';
    public $image;
    public $oldImage;
    public $category_id;
    public $categories = [];

    public function mount($id)
    {
        $blog = Blog::findOrFail($id);

        $this->blogId = $blog->id;
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->description = $blog->description;
        $this->oldImage = $blog->image;
        $this->category_id = $blog->blog_category_id;
        $this->categories = BolgCategory::orderBy('name')->get();
    }

    public function update()
    {
        try {
            $this->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|max:2048',
                'category_id' => 'required|exists:bolg_categories,id',
            ]);

            $blog = Blog::findOrFail($this->blogId);

            // If new image is uploaded
            if ($this->image) {
                // Delete old image if exists
                if ($this->oldImage && file_exists(public_path('storage/' . $this->oldImage))) {
                    unlink(public_path('storage/' . $this->oldImage));
                }

                $imageName = Str::slug($this->title) . '-' . time() . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('blogs', $imageName, 'public');
                $blog->image = 'blogs/' . $imageName;
            }

            $blog->title = $this->title;
            $blog->slug = $this->slug;
            $blog->description = $this->description;
            $blog->blog_category_id = $this->category_id;
            $blog->author_name = auth()->user()->name; 
            $blog->save();

            $this->dispatch('toastr:success', message: 'Blog updated successfully.');
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
        return view('livewire.backend.blogs.edit-blog')->layout('backend.template.body');
    }
}
