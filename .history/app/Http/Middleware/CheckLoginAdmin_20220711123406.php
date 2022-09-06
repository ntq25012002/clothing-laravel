<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
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
        if (! Auth::check()) {
            return redirect('login');
        }else{
            if(!$this->isLoginAmin()){
                return redirect()->route('welcome');
                // return redirect()->back()->with('msg_err','Bạn không có quyền truy cập !');
            }
            // if($this->isLoginAmin()){
                return $next($request);
            // }
        }
       
        // if($this->isLogin()) {
        //     return redirect()->route('login');
        // }
    }

    public function isLoginAmin() {
        if (Gate::allows('is-admin')) {
            return true;
        }
        return false;
    }
   
}
