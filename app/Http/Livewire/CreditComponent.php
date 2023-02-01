<?php

namespace App\Http\Livewire;

use App\Http\Controllers\RimplenetController;
use Livewire\Component;
use Livewire\WithPagination;

class CreditComponent extends Component
{
    use WithPagination;

    protected $listeners = ['creditCreated' => 'render'];

    public function render()
    {
        $credits = app(RimplenetController::class)->listCredits();
        return view('livewire.credit-component', [
            'credits' => $credits
        ]);
    }

    public function createTestCredit()
    {
        app(RimplenetController::class)->createTestCredit();
        $this->emit('creditCreated');
    }
}
