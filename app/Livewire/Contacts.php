<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Contacts extends Component
{
    public Collection $contacts;

    public function mount(): void
    {
        $this->contacts = Contact::all();
    }

    #[On('contact-created')]
    public function updateContactList()
    {
        $this->contacts = Contact::all();
    }
    
    public function render(): View
    {
        return view('livewire.contacts');
    }
}