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
        $resp = Http::post(Auth::user()->site_url . '/users', [
            'user_email' => $rnd . '@rimplenet.com',
            'user_password' => 'ch@ngeme0bvi0usly',
            'username' => $rnd
        ]);
        $body = json_decode($resp->body());
        logger("Create Test User:: " . $body->message);
        if ($body->status_code == 200) {
            return true;
        } else {
            return false;
        }
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
        $seed = [
            'naira' => ['wallet_id' => 'naira', 'symbol' => 'N'],
            'cedis' => ['wallet_id' => 'cedis', 'symbol' => 'C'],
            'francs' => ['wallet_id' => 'francs', 'symbol' => 'F'],
            'yen' => ['wallet_id' => 'yen', 'symbol' => 'Y'],
            'usd' => ['wallet_id' => 'usd', 'symbol' => '$']
        ];

        foreach ($seed as $s) {
            $resp = Http::post(Auth::user()->site_url . '/wallets', [
                'wallet_name' => Str::ucfirst($s['wallet_id']) . ' Test Wallet',
                'wallet_id' => $s['wallet_id'],
                'wallet_symbol' => $s['symbol'],
                'wallet_note' => Str::ucfirst($s['wallet_id']) . ' Test Wallet',
                'wallet_type' => 'fiat'
            ]);
            $body = json_decode($resp->body());
            logger("Created ". Str::ucfirst($s['wallet_id']) . ' Test Wallet ::' . $body->message);
        }
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
        $resp = Http::post(Auth::user()->site_url . '/credits', [
            'user_id' => 2,
            'wallet_id' => 'usd',
            'request_id' => Str::random(),
            'amount' => 100,
            'note' => 'Test Credit'
        ]);
        $body = json_decode($resp->body());
        logger("Create Test Credit:: " . $body->message);
        if ($body->status_code == 200) {
            return true;
        } else {
            return false;
        }
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
            'user_id' => 2,
            'wallet_id' => 'usd',
            'request_id' => Str::random(),
            'amount' => 10,
            'note' => 'Test Debit'
        ]);
        $body = json_decode($resp->body());
        logger("Create Test Debit:: " . $body->message);
        if ($body->status_code == 200) {
            return true;
        } else {
            report($body->message);
            return false;
        }
    }

    public function listTransfers()
    {
        $resp = Http::get(Auth::user()->site_url . '/transfers');
        $body = json_decode($resp->body());
        return $body->status_code == 404 ? Collection::empty() : Collection::make($body->data)->paginate(5);
    }

    public function createTestTransfer()
    {
        $resp = Http::post(Auth::user()->site_url . '/transfers', [
            'transfer_from_user' => 2,
            'wallet_id' => 'usd',
            'transfer_to_user' => 3,
            'amount_to_transfer' => 10,
            'note' => 'Test Transfer'
        ]);
        $body = json_decode($resp->body());
        logger("Create Test Transfer:: " . $body->message);
        if ($body->status_code == 200) {
            return true;
        } else {
            report($body->message);
            return false;
        }
    }

    // API Functions
    public function apiLoginUser(APILoginUserRequest $request)
    {
        $validated = $request->validated();
        $resp = Http::post(Auth::user()->site_url . '/users/login', $validated);
        $body = json_decode($resp->body());
        return response()->json([
            'message' => $body->message,
            'data' => $body->status ? $body->data : ['An error occured']
        ], $body->status_code);
    }

    public function apiRegisterUser(APIRegisterUserRequest $request)
    {
        $validated = $request->validated();
        $resp = Http::post(Auth::user()->site_url . '/users', $validated);
        $body = json_decode($resp->body());
        return response()->json([
            'message' => $body->message,
            'response' => $body
        ], 200);
    }

    public function apiCreateCredit(APICreateCreditRequest $request)
    {
        $validated = $request->validated();
        $resp = Http::post(Auth::user()->site_url . '/credits', [
            'user_id' => $validated['user_id'],
            'wallet_id' => $validated['wallet_id'],
            'request_id' => Str::random(),
            'amount' => $validated['amount'],
            'note' => $validated['note']
        ]);
        $body = json_decode($resp->body());
        return response()->json([
            'message' => $body->message,
            'response' => $body
        ], 200);
    }

    public function apiCreateDebit(APICreateDebitRequest $request)
    {
        $validated = $request->validated();
        $resp = Http::post(Auth::user()->site_url . '/debits', [
            'user_id' => $validated['user_id'],
            'wallet_id' => $validated['wallet_id'],
            'request_id' => Str::random(),
            'amount' => $validated['amount'],
            'note' => $validated['note']
        ]);
        $body = json_decode($resp->body());
        return response()->json([
            'message' => $body->message,
            'response' => $body
        ], 200);
    }

    public function apiCreateWallet(APICreateWalletRequest $request)
    {
        $validated = $request->validated();
        $resp = Http::post(Auth::user()->site_url . '/wallets', [
            'wallet_name' => Str::ucfirst($validated['wallet_name']),
            'wallet_id' => $validated['wallet_id'],
            'wallet_symbol' => $validated['wallet_symbol'],
            'wallet_note' => Str::ucfirst($validated['wallet_note']) . ' Wallet Created via API',
            'wallet_type' => $validated['wallet_type']
        ]);
        $body = json_decode($resp->body());
        return response()->json([
            'response' => $body
        ]);
    }

    public function apiCreateTransfer(APICreateTransferRequest $request)
    {
        $validated = $request->validated();
        $resp = Http::post(Auth::user()->site_url . '/transfers', [
            'transfer_from_user' => $validated['transfer_from_user'],
            'wallet_id' => $validated['wallet_id'],
            'transfer_to_user' => $validated['transfer_to_user'],
            'amount_to_transfer' => $validated['amount_to_transfer'],
            'note' => $validated['note']
        ]);
        $body = json_decode($resp->body());
        return response()->json([
            'message' => $body->message,
            'response' => $body
        ], 200);
    }
}
