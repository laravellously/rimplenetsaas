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
        $created = app(RimplenetController::class)->createTestDebit();
        if ($created) {
            $this->emit('debitCreated');
        } else {
            $this->emitSelf('debitNotCreated');
        }
    }
}
