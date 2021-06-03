<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $token = $user->createToken('api_token')->accessToken;

        $user = [
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token,
            'account' => $user->account,
        ];

        return response()->json($user);
    }

    public function logout()
    {
        $user = User::find(auth()->user()->id);

        $user->tokens()->delete();
        return response('token revogado!', 200);
    }

    public function auth()
    {
        return response(auth()->user(),200);
        $user = User::find(auth('web')->user()->id)->with('account')->first();
        return response($user, 200);
    }
}
