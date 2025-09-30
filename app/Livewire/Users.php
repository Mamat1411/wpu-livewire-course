<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithFileUploads, WithPagination;

    public $query = '';

    // public data
    // public $title = 'Users Page';

    // PHP 8 Attribute(Annotation) Validation
    #[Validate(['required', 'min:3'])]
    public $name = '';

    #[Validate(['required', 'email:dns', 'unique:users'])]
    public $email = '';

    #[Validate(['required', 'min:8'])]
    public $password = '';

    #[Validate(['image', 'max:5120'])]
    public $avatar = '';

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

        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar']
        ]);

        $this->reset();

        session()->flash('success', 'User Succesfully Added');
    }

    public function updatedQuery() {
        $this->resetPage();
    }

    public function search() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users', [
            // function scoped data
            'title' => 'Users Page',
            'users' => User::latest()->where('name', 'like', "%{$this->query}%")->paginate(6)
        ]);
    }
}
