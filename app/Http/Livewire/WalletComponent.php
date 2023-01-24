<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WalletComponent extends Component
{
    public $wallets = [];
    public $url = 'https://test1.kubectl.bluudigital.com/wp-json/rimplenet/v1';

    public function mount(){
        $resp = Http::get($this->url.'/wallets');
        $body = json_decode($resp->body());
        $this->wallets = $body->data;
    }

    public function render()
    {
        return view('livewire.wallet-component');
    }
}
