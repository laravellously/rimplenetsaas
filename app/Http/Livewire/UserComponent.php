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
        $created = app(RimplenetController::class)->createTestUser();
        if ($created) {
            $this->emit('userDeleted');
        } else {
            $this->emit('userNotCreated');
        }
    }

    public function render()
    {
        $users = app(RimplenetController::class)->getUsers();
        return view('livewire.user-component', [
            "users" => $users
        ]);
    }
}
