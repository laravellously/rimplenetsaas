<?php

namespace App\Http\Controllers;

use App\Http\Requests\APICreateCreditRequest;
use App\Http\Requests\APICreateDebitRequest;
use App\Http\Requests\APICreateTransferRequest;
use App\Http\Requests\APICreateWalletRequest;
use App\Http\Requests\APILoginUserRequest;
use App\Http\Requests\APIRegisterUserRequest;
use App\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class RimplenetController extends Controller
{
    // Users
    public function getUsers(): Collection | LengthAwarePaginator
    {
        $resp = Http::get(Auth::user()->site_url . '/users');
        $body = json_decode($resp->body());
        // remove admin user
        return $body->status_code == 404 ? Collection::empty() : Collection::make($body->data->users)->paginate(3);
    }

    public function countUsers(): int
    {
        $resp = Http::get(auth()->user()->site_url . '/users');
        $body = json_decode($resp->body());
        // dump($body);
        $count = $body->status_code == 404 ? 0 : $body->data->others->totalUsers;
        return $count;
    }

    public function deleteUser($id)
    {
        $resp = Http::delete(Auth::user()->site_url . '/users/' . $id);
        return true;
    }

    public function createTestUser()
    {
        $rnd = Str::lower(Str::random(6));
        try {
            Http::post(Auth::user()->site_url . '/users', [
                'user_email' => $rnd . '@rimplenet.com',
                'user_password' => 'ch@ngeme0bvi0usly',
                'username' => $rnd
            ]);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
        return true;
    }

    public function loginUser()
    {
        //
    }

    // Wallets
    public function getWallets(): Collection | LengthAwarePaginator
    {
        $resp = Http::get(Auth::user()->site_url . '/wallets');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? Collection::empty() : Collection::make($body->data)->paginate(5);
    }

    public function countWallets(): int
    {
        $resp = Http::get(auth()->user()->site_url . '/wallets');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? 0 : count($body->data);
    }

    public function deleteWallet($id)
    {
        Http::delete(Auth::user()->site_url . '/wallets/' . $id);
        return true;
    }

    public function createTestWallet()
    {
        $resp = Http::post(Auth::user()->site_url . '/wallets', [
            'wallet_name' => 'Test Wallet',
            'wallet_id' => Str::random(4),
            'wallet_symbol' => '$',
            'wallet_note' => 'Test Wallet - ' . Str::random(6),
            'wallet_type' => 'fiat'
        ]);
        return true;
    }

    // Transactions
    public function listCredits()
    {
        $resp = Http::get(Auth::user()->site_url . '/credits');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? Collection::empty() : Collection::make($body->data)->paginate(5);
    }

    public function createTestCredit()
    {
        Http::post(Auth::user()->site_url . '/credits', [
            'user_id' => 6,
            'wallet_id' => 'tuel',
            'request_id' => Str::random(),
            'amount' => 100,
            'note' => 'Test Credit'
        ]);
        return true;
    }

    public function listDebits()
    {
        $resp = Http::get(Auth::user()->site_url . '/debits');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? Collection::empty() : Collection::make($body->data)->paginate(5);
    }

    public function createTestDebit()
    {
        $resp = Http::post(Auth::user()->site_url . '/debits', [
            'user_id' => 6,
            'wallet_id' => 'tuel',
            'request_id' => Str::random(),
            'amount' => 10,
            'note' => 'Test Debit'
        ]);
        return true;
    }

    public function listTransfers()
    {
        $resp = Http::get(Auth::user()->site_url . '/transfers');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? Collection::empty() : Collection::make($body->data)->paginate(5);
    }

    public function createTestTransfer()
    {
        Http::post(Auth::user()->site_url . '/transfers', [
            'transfer_from_user' => 6,
            'wallet_id' => 'tuel',
            'transfer_to_user' => 5,
            'amount_to_transfer' => 10,
            'note' => 'Test Transfer'
        ]);
        return true;
    }

    // API Functions
    public function apiLoginUser(APILoginUserRequest $request)
    {
        $resp = Http::post(Auth::user()->site_url . '/user/login', [
            'user_email' => $request->user_email,
            'user_password' => $request->user_password,
            'token_expiration' => 60
        ]);
        $body = json_decode($resp->body());
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }

    public function apiRegisterUser(APIRegisterUserRequest $request)
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }

    public function apiCreateCredit(APICreateCreditRequest $request)
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }

    public function apiCreateDebit(APICreateDebitRequest $request)
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }

    public function apiCreateWallet(APICreateWalletRequest $request)
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }

    public function apiCreateTransfer(APICreateTransferRequest $request)
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }
}
