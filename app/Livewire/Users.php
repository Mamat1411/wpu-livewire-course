<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

//this layout attribute foldering begins from inside /views. the default is app.blade.php
//to change the default, publish the livewire config with php artisan livewire:publish
#[Title('Users Page')]
#[Layout('components.layouts.app')]
class Users extends Component
{
    public function render()
    {
        return view('livewire.users');
    }
}
