<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login-form');
    }
    public function postLogin(Request $request) {
        dd(auth()->attempt([
            'email' => $request->email,
            'password' => $request->pass
        ]));
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->pass
        ])){
            return redirect()->to('admin.dashboard');
        };

        // dd($request->all());
    }
}
