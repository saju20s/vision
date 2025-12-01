<?php

namespace App\Livewire\Frontend;

use App\Models\Blog;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class BlogPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function incrementView($blogId)
    {
        $blog = Blog::find($blogId);

        if ($blog) {
            $blog->increment('views');
        }
    }

    public function formatViews($number)
    {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 1) . 'B';
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 1) . 'k';
        } else {
            return $number;
        }
    }


    public function render()
    {
        $blogs = Blog::latest()->paginate(12);
        $setting = Setting::find(1);

        return view('livewire.frontend.blog-page', [
            'datas' => $blogs,
            'setting' => $setting,
        ])->layout('frontend.template.body');
    }
}
