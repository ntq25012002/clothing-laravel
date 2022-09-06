<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login-form');
    }
    public function postLogin(Request $request) {
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->pass
        ]))
        dd($request->all());
    }
}
