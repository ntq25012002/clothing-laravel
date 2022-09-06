<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod(); // Trả về tên hàm thực hiện validate
        // $id = $this->getId();
        // dd($currentAction);
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            "name" => 'required',
                            "email" => 'required|email|unique:users,email',
                            "role_ids" => 'required',
                            'password' => 'required|min:6|confirmed',
                        ];
                        break;
                    case 'update':
                        $id = $request->id;
                        $rules = [
                            "name" => 'required',
                            "email" => 'required|email|unique:users,email,'.$id ,
                            "role_ids" => 'required',
                        ];
                        break;
                    default:
                        # code...
                        break;    
                }
                break;
            default:
                # code...
                break;
        }
        return $rules;
        
    }
    public function messages() {
        return [
            "name.required" => 'Vui lòng nhập đầy đủ họ tên',
            "email.required" => 'Vui lòng nhập email',
            "email.email" => 'Định dạnh email chưa đúng',
            "email.unique" => 'Email đã tồn tại',
            "role_ids.required" => 'Vui lòng chọn vai trò',
            "password.required" => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
            "password.min" => 'Mật khẩu phải có tối thiểu :min ký tự',
        ];
    }
}
