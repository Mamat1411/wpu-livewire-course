<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $query = '';

    #[On('user-created')]
    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        return view('livewire.placeholders.skeleton');
    }

    // computed properties
    #[Computed()]
    public function users() {
        return User::latest()->where('name', 'like', "%{$this->query}%")->paginate(6);
    }

    // you can remove this method because the view naming convention is same as livewire component class
    public function render()
    {
        sleep(1);

        return view('livewire.users-list', [
            'title' => 'Users Page'
        ]);
    }
}
