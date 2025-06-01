<?php

namespace App\Livewire\Components;

use Livewire\Component;

class BlogSidebar extends Component
{
    public function render()
    {
        $categories = \App\Models\BlogCategory::withCount('blogs')
            ->orderBy('blogs_count', 'desc')
            ->take(10)
            ->get();

        $latestBlogs = \App\Models\Blog::latest()->take(5)->get();
        return view('livewire.components.blog-sidebar', compact('categories','latestBlogs'))
            ->layout('layouts.app');
    }
}
