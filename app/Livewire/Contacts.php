<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Livewire\Component;

class Contacts extends Component
{
    public Collection $contacts;

    public function mount()
    {
        $this->contacts = Contact::all();
    }
    
    public function render()
    {
        return view('livewire.contacts');
    }
}