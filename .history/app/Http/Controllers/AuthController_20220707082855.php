<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login-form');
    }
    public function postLogin(Request $request) {
        // dd($request->all());
        // dd(auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->pass
        // ],true));
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return redirect()->route('admin.user.index');
        };

        // dd($request->all());
    }
}
