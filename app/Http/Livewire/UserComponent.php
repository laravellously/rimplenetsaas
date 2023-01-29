<?php

namespace App\Http\Livewire;

use App\Http\Controllers\RimplenetController;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;

    protected $listeners = ['userDeleted' => 'render'];

    public function deleteUser($id){
        app(RimplenetController::class)->deleteUser($id);
        $this->emit('userDeleted');
    }

    public function createTestUser()
    {
        app(RimplenetController::class)->createTestUser();
        $this->emit('userDeleted');
    }

    public function render()
    {
        $users = app(RimplenetController::class)->getUsers();
        return view('livewire.user-component', [
            "users" => $users
        ]);
    }
}
