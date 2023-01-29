<?php

namespace App\Http\Livewire\Card;

use App\Http\Controllers\RimplenetController;
use Livewire\Component;

class UserCard extends Component
{
    public $url = 'https://test1.kubectl.bluudigital.com/wp-json/rimplenet/v1';

    public function render()
    {
        $count = app(RimplenetController::class)->countUsers();
        return view('livewire.card.user-card', ['count' => $count]);
    }
}
