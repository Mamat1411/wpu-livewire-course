<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    // public data
    // public $title = 'Users Page';

    public $name;
    public $email;
    public $password;

    public function createUser() {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $this->reset();
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
