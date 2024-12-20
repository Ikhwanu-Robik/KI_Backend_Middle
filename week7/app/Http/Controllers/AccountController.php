<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    function login(Request $request) {
        $request->validate([
            'username' => 'required'
        ]);

        $request->session()->put('user_name', $request->username);

        return redirect('/dashboard');
    }

    function logout(Request $request) {
        $request->session()->forget('user_name');

        return redirect('/login');
    }
}
