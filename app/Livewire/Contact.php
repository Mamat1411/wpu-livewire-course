<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact Page')]
class Contact extends Component
{
    public ContactForm $contactForm;

    public function createMessage()
    {
        $this->contactForm->store();

        session()->flash('success', 'Your message has been succesfully sent!');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
