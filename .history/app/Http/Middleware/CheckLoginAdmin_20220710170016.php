<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$this->isLoginAmin()){
            return redirect()->route('welcome');
        }
        if($this->isLoginAmin()){
            return $next($request);
        }
        if($this->isLogin()) {
            return redirect()->route('login');
        }
    }

    public function isLoginAmin() {
        if (Gate::allows('is-admin')) {
            return true;
        }
        return false;
    }
    public function isLogin() {
        if(Auth::user()) {
            return true;
        }
    }
}
