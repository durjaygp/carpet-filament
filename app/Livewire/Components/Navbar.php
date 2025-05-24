<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Navbar extends Component
{
    // Inside your NavMenu Livewire component
    public function goToPage($page)
    {
        $this->emit('navigate', $page);
    }

    public function render()
    {
        return view('livewire.components.navbar')->layout('layouts.app');
    }
}
