<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Blog extends Component
{
    #[\Livewire\Attributes\Url]
    public string $page = '1';
    public function render()
    {
        $blogs = \App\Models\Blog::with('category')->latest()->paginate(10);
        return view('livewire.pages.blog',compact('blogs'))->layout('layouts.app');
    }
}
