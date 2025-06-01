<?php

namespace App\Livewire\Pages;

use App\Models\HomepageSetting;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        $homepage = HomepageSetting::first();
        return view('livewire.pages.home',compact('homepage'))->layout('layouts.app');
    }
}
