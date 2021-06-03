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
            'type' => 'negative',
            'value' => $request->value,
        ]);

        return response($account, 200);
    }

    public function deposit(Request $request)
    {

        $accountTo = Account::where([
            'agency' => $request->agency,
            'account' => $request->account,
        ])->first();

        if (isset($accountTo)) {

            $balance = $accountTo->balance + $request->balance;

            $accountTo->update(['balance' => $balance]);

            Extract::create([
                'from' => $accountTo->user->id,
                'to' => $accountTo->user->id,
                'operation' => 'Depósito',
                'type' => 'positive',
                'value' => $request->balance,
                'description' => $request->description || null,
            ]);

            return response($accountTo, 200);
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

            // return "$balance e $balanceTo";

            $account->update(['balance' => $balance]);
            $accountTo->update(['balance' => $balanceTo]);

            Extract::create([
                'from' => $account->user->id,
                'to' => $accountTo->user->id,
                'operation' => 'Transferência',
                'type' => 'negative',
                'value' => $request->value,
                'description' => $request->description || null,
            ]);

            return response($account, 200);
        }

        return response('Conta não encontrada!', 404);
    }
}
