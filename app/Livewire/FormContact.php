<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormContact extends Component
{
    #[Validate('required|min:3|max:50')]
    public string $name;

    #[Validate('required|email|min:5|max:50')]
    public string $email;

    #[Validate('required|min:6|max:20')]
    public string $phone;

    public function newContact()
    {
        // validate
        $this->validate();
        
        // temporary store in log file
        // Log::info('Novo contacto: ' . $this->name . ' - ' . $this->email . ' - ' . $this->phone);

        // Store contact in database
        $result = Contact::firstOrCreate(
            [
                'name' => $this->name,
                'email' => $this->email
            ],
            [
                'phone' => $this->phone
            ]
        );

        if($result->wasRecentlyCreated){
            
             // Clear public properties
            $this->reset();

            // $this->success = "Contact created successfully";

            // create event to display new contact
            $this->dispatch('contact-created');
            
            $this->dispatch(
                'notification',
                type: 'success',
                title: 'Contact created successfully',
                position: 'center'
            );
            
         } else {
            
            // $this->error = "The contact already exists";
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'The contact already exists',
                position: 'center'
            );
            
         } 

    }
    
    public function render(): View
    {
        return view('livewire.form-contact');
    }
}