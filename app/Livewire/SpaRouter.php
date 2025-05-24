<?php

namespace App\Livewire;

use Livewire\Component;

class SpaRouter extends Component
{
    public $page = 'home';

    protected $listeners = ['navigate' => 'goToPage'];

    public function goToPage($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.spa-router')->layout('layouts.app');
    }
}
