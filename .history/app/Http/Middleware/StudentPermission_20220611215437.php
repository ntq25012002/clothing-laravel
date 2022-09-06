<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentPermission
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

        if(!$this->isLogined()){
            echo 'Vui lòng đăng nhập để sử dụng chức năng này !';
            return redirect(route('list-students'));
        }
        return $next($request);
    }

    public function isLogined(){
        return false;
    }
}
