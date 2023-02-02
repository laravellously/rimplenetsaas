<?php

namespace App\Http\Livewire;

use App\Http\Controllers\RimplenetController;
use App\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\Request;
use Livewire\WithPagination;

class WalletComponent extends Component
{
    use WithPagination;

    protected $listeners = [
        'walletDeleted' => 'render'
    ];

    public function deleteWallet($id)
    {
        app(RimplenetController::class)->deleteWallet($id);
        $this->emit('walletDeleted');
    }

    public function createTestWallet()
    {
        $created = app(RimplenetController::class)->createTestWallet();
        if ($created) {
            $this->emit('walletDeleted');
        } else {
            $this->emit('walletNotCreated');
        }
    }

    public function render()
    {
        $wallets = app(RimplenetController::class)->getWallets();
        return view('livewire.wallet-component', [
            "wallets" => $wallets
        ]);
    }
}
