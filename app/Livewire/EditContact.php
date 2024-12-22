<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Validate;

class EditContact extends Component
{
    #[Validate('required|min:3|max:50')]
    public string $name;

    #[Validate('required|email|min:5|max:50')]
    public string $email;

    #[Validate('required|min:6|max:20')]
    public string $phone;

    public Contact $contact;

    public function mount(string|int $id)
    {
        $id = decrypt($id);
        $this->contact = Contact::findOrFail($id);
        
        $this->name = $this->contact->name;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;
    }

    public function updateContact()
    {
        $this->validate();

        // check if email already exists
        $contact = Contact::where('name', $this->name)
                            ->where('email', $this->email)
                            ->where('id', '!=', $this->contact->id)
                            ->first();
                            
        if($contact){
            session()->flash('error', 'Contact alreay exists.');
            return;
        }

        $this->contact->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        return redirect()->route('home');
    }

    #[Title('Edit contact')]
    public function render()
    {
        return view('livewire.edit-contact');
    }
}