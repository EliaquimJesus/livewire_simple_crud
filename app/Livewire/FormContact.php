<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;

class FormContact extends Component
{
    public $name, $email, $phone;

    public function newContact()
    {
        //validate
        $this->validate(
            [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|min:5|max:50',
                'phone' => 'required|min:6|max:20'
            ]
        );

        // temporary store in log file
        Log::info('Novo contacto: ' . $this->name . '-' . $this->email . '-' . $this->phone);
    }
    
    public function render(): View
    {
        return view('livewire.form-contact');
    }
}