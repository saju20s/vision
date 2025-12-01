<?php

namespace App\Livewire\Frontend;

use App\Models\Blog;
use App\Models\Setting;
use Livewire\Component;

class BlogView extends Component
{
    public $blogId;
    public $blog;
    public $relatedPosts; // নতুন property

    public function mount($id)
    {
        $this->blogId = $id;
        $this->blog = Blog::findOrFail($id);

        // related posts fetch করা
        $this->relatedPosts = Blog::where('blog_category_id', $this->blog->blog_category_id)
            ->where('id', '!=', $this->blog->id)
            ->latest()
            ->take(3)
            ->get();
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.frontend.blog-view',[
            'setting' => $setting,
        ])->layout('frontend.template.body');
    }
}
