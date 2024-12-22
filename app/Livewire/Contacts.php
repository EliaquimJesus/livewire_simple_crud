<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;

    public string $search = '';
    private int $contactsPerPage = 4;

    #[On('contact-created')]
    public function updateContactList()
    {}
    
    public function render(): View
    {
        $contacts = null;
        
        $contacts = $this->search ? Contact::where('name', 'like', '%' . $this->search . '%')
                                                ->orWhere('email', 'like', '%' . $this->search . '%')
                                                ->orWhere('phone', 'like', '%' . $this->search . '%')
                                                ->paginate($this->contactsPerPage)
                                                 : Contact::paginate($this->contactsPerPage);

        return view('livewire.contacts')->with('contacts', $contacts);
    }
}