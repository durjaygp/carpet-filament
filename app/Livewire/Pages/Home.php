<?php

namespace App\Livewire\Pages;

use App\Models\HomepageSetting;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        $homepage = HomepageSetting::first();
        $products = Product::all();
        return view('livewire.pages.home',compact('homepage','products'))->layout('layouts.app');
    }
}
