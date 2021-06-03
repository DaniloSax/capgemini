<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Extract;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);

        return response()->json($user->account);
    }
    
    /**
     * Saque
     */
    public function update(Request $request, Account $account)
    {
        $balance = $account->balance - $request->value;

        $account->update(['balance' => $balance]);

        Extract::create([
            'from' => $account->user->id,
            'to' => $account->user->id,
            'operation' => 'Saque',
            'type' => 'positive',
            'value' => $request->value,
        ]);

        return response($account, 200);
    }

    public function deposit(Request $request)
    {

        $account = Account::where([
            'agency' => $request->agency,
            'account' => $request->account,
        ])->first();

        if (isset($account)) {

            $balance = $account->balance + $request->balance;

            $account->update(['balance' => $balance]);

            return response($account, 200);
        }

        return response('Conta não encontrada!', 404);
    }

    public function transfer(Request $request, Account $account)
    {
        $accountTo = Account::where([
            'agency' => $request->agency,
            'account' => $request->account,
        ])->first();

        if (isset($accountTo)) {

            $balance = $account->balance - $request->value;
            $balanceTo = $accountTo->balance + $request->value;

            $account->update(['balance' => $balance]);
            $accountTo->update(['balance' => $balanceTo]);

            return response($account, 200);
        }

        return response('Conta não encontrada!', 404);
    }
}
