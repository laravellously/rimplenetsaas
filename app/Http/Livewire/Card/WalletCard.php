<?php

namespace App\Http\Livewire\Card;

use App\Http\Controllers\RimplenetController;
use Livewire\Component;

class WalletCard extends Component
{

    protected $listeners = ['walletDeleted' => 'render'];

    public function render()
    {
        $count = app(RimplenetController::class)->countWallets();
        return view('livewire.card.wallet-card', ['count' => $count]);
    }
}
