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

    protected $listeners = ['walletDeleted' => 'render'];

    public function getWallets()
    {
        return app(RimplenetController::class)->getWallets();
    }

    public function deleteWallet($id)
    {
        app(RimplenetController::class)->deleteWallet($id);
        $this->emit('walletDeleted');
    }

    public function createTestWallet()
    {
        app(RimplenetController::class)->createTestWallet();
        $this->emit('walletDeleted');
    }

    public function render()
    {
        $wallets = $this->getWallets();
        return view('livewire.wallet-component', [
            "wallets" => $wallets
        ]);
    }
}
