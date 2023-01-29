<?php

namespace App\Http\Controllers;

use App\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RimplenetController extends Controller
{
    // Users
    public function getUsers(): Collection
    {
        $resp = Http::get(Auth::user()->site_url.'/users');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? Collection::empty() : Collection::make($body->data->users)->paginate(3);
    }

    public function countUsers(): int
    {
        $resp = Http::get(auth()->user()->site_url.'/users');
        $body = json_decode($resp->body());
        // dump($body);
        $count = $body->status_code == 404 ? 0 : $body->data->others->totalUsers;
        return $count;
    }

    public function deleteUser($id)
    {
        Http::delete(Auth::user()->site_url.'/users/'.$id);
        return true;
    }

    public function createTestUser()
    {
        Http::post(Auth::user()->site_url.'/users', [
            'user_email' => 'iamtest@change.me',
            'user_password' => 'ch@ngeme0bvi0usly',
            'username' => 'iamtest'
        ]);
        return true;
    }

    public function loginUser()
    {
        //
    }

    // Wallets
    public function getWallets(): Collection | LengthAwarePaginator
    {
        $resp = Http::get(Auth::user()->site_url.'/wallets');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? Collection::empty() : Collection::make($body->data)->paginate(3);
    }

    public function countWallets(): int
    {
        $resp = Http::get(auth()->user()->site_url.'/wallets');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? 0 : count($body->data);
    }

    public function deleteWallet($id)
    {
        Http::delete(Auth::user()->site_url.'/wallets/'.$id);
        return true;
    }

    public function createTestWallet()
    {
        Http::post(Auth::user()->site_url.'/wallets', [
            'wallet_name' => 'Test Wallet',
            'wallet_id' => 'test',
            'wallet_symbol' => '$',
            'wallet_note' => 'A Wallet created by me',
            'wallet_type' => 'fiat'
        ]);
        return true;
    }

    // Transactions

}
