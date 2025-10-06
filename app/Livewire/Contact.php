<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact Page')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact');
    }
}
