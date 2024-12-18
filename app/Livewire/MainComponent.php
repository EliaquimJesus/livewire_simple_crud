<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class MainComponent extends Component
{
    #[Title('Livewire Contacts')]
    public function render()
    {
        return view('livewire.main-component');
    }
}