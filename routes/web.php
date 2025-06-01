<?php

use App\Livewire\Pages\About;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Blog;
use App\Livewire\Pages\BlogDetails;
use App\Livewire\Pages\Home;
use App\Livewire\SpaRouter;
use Illuminate\Support\Facades\Route;


Route::get('/', SpaRouter::class);
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/blog/{slug}', BlogDetails::class)->name('blog-details');
