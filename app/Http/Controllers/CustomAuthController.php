<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\Validator;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login-2');
    }

    public function login(Request $request) {
        // dd($request->all());
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

    public function registerForm() {

    }

    public function logout(Request $request) {
        Auth::logout();
//        // Làm mất hiệu lực của session
//        $request->session()->invalidate();
//        // Reset Token
//        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
