<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    // public data
    // public $title = 'Users Page';

    public function render()
    {
        return view('livewire.users', [
            // function scoped data
            'title' => 'Users Page',
            'users' => User::all()
        ]);
    }
}
