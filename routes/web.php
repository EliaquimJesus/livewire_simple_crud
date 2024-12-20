<?php

use App\Livewire\ConfirmDelete;
use App\Livewire\MainComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', MainComponent::class)->name('home');

Route::get('/contacts/delete/{id}', ConfirmDelete::class)->name('contacts.delete');