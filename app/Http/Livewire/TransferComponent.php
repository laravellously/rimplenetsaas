<?php

namespace App\Http\Livewire;

use App\Http\Controllers\RimplenetController;
use Livewire\Component;
use Livewire\WithPagination;

class TransferComponent extends Component
{
    use WithPagination;

    protected $listeners = ['transferCreated' => 'render'];

    public function render()
    {
        $transfers = app(RimplenetController::class)->listTransfers();
        return view('livewire.transfer-component', [
            'transfers' => $transfers
        ]);
    }

    public function createTestTransfer()
    {
        app(RimplenetController::class)->createTestTransfer();
        $this->emit('transferCreated');
    }
}
