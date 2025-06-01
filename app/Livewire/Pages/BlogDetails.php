<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class BlogDetails extends Component
{
    public function render()
    {
        $blog = \App\Models\Blog::where('slug', request()->route('slug'))->firstOrFail();
        $relatedBlogs = \App\Models\Blog::where('id', '!=', $blog->id)
            ->where('category_id', $blog->category_id)
            ->latest()
            ->take(3)
            ->get();
        return view('livewire.pages.blog-details', compact('blog','relatedBlogs'))
            ->layout('layouts.app', ['title' => $blog->title, 'description' => $blog->seo_description]);
    }
}
