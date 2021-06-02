<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'agency' => 'required',
            'account' => 'required',
            'password' => 'required'
        ]);

        $account = Account::where([
            'agency' => $request->agency,
            'account' => $request->account,
        ])->first();

        $user = $account->user ?? '';

        if (!$user || empty($user) || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas estão incorretas.'],
            ]);
        }
        $token = $user->createToken('api_token');

        $user = [
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token->plainTextToken,
            'account' => $user->account,
        ];
        return response()->json($user);
    }

    public function logout()
    {
        return 'chegou no logout';
    }
}
