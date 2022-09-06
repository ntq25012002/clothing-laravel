<?php

namespace App\Http\Middleware;

use Closure;
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
        if(!$this->isLoginClient()){
            return redirect()->route('welcome');
        }
        if($this->isLoginAmin()){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }

    public function isLoginAmin() {
        if (Gate::allows('is-admin')) {
            return true;
        }
        return false;
    }
    public function isLoginClient() {
        if(Gate::allows('is-client')) {
            return true;
        }
        return false;
    }
}
