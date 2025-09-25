<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Users extends Component
{
    // public data
    // public $title = 'Users Page';

    // PHP 8 Attribute(Annotation) Validation
    #[Validate(['required', 'min:3'])]
    public $name = '';

    #[Validate(['required', 'email:dns', 'unique:users'])]
    public $email = '';

    #[Validate(['required', 'min:8'])]
    public $password = '';

    public function createUser() {

        // Laravel-style validation
        // $validated = $this->validate([
        //     'name' => ['required', 'min:3'],
        //     'email' => ['required', 'email:dns', 'unique:users'],
        //     'password' => ['required', 'min:8']
        // ]);

        // User::create([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => Hash::make($validated['password'])
        // ]);

        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $this->reset();

        session()->flash('success', 'User Succesfully Added');
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
