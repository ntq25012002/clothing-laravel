<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function clientLogin(Request $request) {
        dd($request->all());
        $rules = [
            'email' => 'required | email',
            'password' => 'required'
        ];
        $messages = [
            'email.requied' => 'Bắt buộc nhập',
            'email.email' => 'Chưa đúng định dạng email',
            'password.required' => 'Bắt buộc nhập'
        ];
        // $request->validate($rules,$messages);
        $validator = Validator::make($request->all(),$rules,$messages);
        // dd($validator);
        if($validator->fails()) {
            return redirect('/login')->withErrors($validator)->withInput();
        }else{
            $email = $request->input('email');
            $password = $request->input('password');
            $credentials = [
                'email' => $email ,
                'password' => $password
            ];
            if(Auth::attempt($credentials)) {
                // $request->session()->regenerate();
                return redirect()->intended('/admin');
            }else{
                Session::flash('error','Email hoặc mật khẩu không đúng');
                return redirect()->back();
            }
        }
        // return redirect('admin');
        // return redirect("login")->with('msg','Đăng nhập thất bại');
    }

}
