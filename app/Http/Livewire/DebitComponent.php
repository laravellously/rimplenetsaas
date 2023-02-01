<?php

namespace App\Http\Livewire;

use App\Http\Controllers\RimplenetController;
use Livewire\Component;
use Livewire\WithPagination;

class DebitComponent extends Component
{
    use WithPagination;

    protected $listeners = ['debitCreated' => 'render'];

    public function render()
    {
        $debits = app(RimplenetController::class)->listDebits();
        return view('livewire.debit-component', [
            'debits' => $debits
        ]);
    }

    public function createTestCredit()
    {
        app(RimplenetController::class)->createTestDebit();
        $this->emit('debitCreated');
    }
}
