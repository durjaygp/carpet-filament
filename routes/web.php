<?php

use App\Livewire\Pages\About;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Blog;
use App\Livewire\Pages\BlogDetails;
use App\Livewire\Pages\Home;
use App\Livewire\SpaRouter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductImportController;

Route::get('/', SpaRouter::class);
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/blog/{slug}', BlogDetails::class)->name('blog-details');


Route::get('/products/import', [ProductImportController::class, 'showForm'])->name('products.import.form');
Route::post('/products/import', [ProductImportController::class, 'import'])->name('products.import');
