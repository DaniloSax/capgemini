<?php

namespace App\Http\Controllers;

use App\Models\Extract;
use App\User;
use Illuminate\Http\Request;

class ExtractController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $extracts = Extract::where('to', $user->id)->orWhere('from', $user->id)->get();

        foreach ($extracts as $item) {
            $item->from = User::where('id', $item->from)->first();
            $item->to = User::where('id', $item->to)->first();
        }

        return response()->json($extracts);
    }
}
