<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    // public data
    // public $title = 'Users Page';

    public function createUser() {
        User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => Hash::make('password')
        ]);
    }

    public function render()
    {
        return view('livewire.users', [
            // function scoped data
            'title' => 'Users Page',
            'users' => User::all()
        ]);
    }
}
