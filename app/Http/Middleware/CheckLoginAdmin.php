<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//        if(!Auth::check()) {
//            return redirect('login')->with('msg_err','Bạn chưa đăng nhập !');
//        }else{
//            if(!$this->isLoginAdmin()) {
//                return redirect('login')->with('msg_err','Bạn không có quyền truy cập !');
//            }
//        }

        return $next($request);

    }

    public function isLoginAdmin() {
        if(Auth::check()) {
            foreach (Auth::user()->roles as $item) {
                if($item->id == 2) {
                    return false;
                }
            }
            return true;
        }
    }
}
