<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod(); // Trả về tên hàm thực hiện validate
        // $id = $this->getId();
        // dd($currentAction);
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'postCheckOut':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email',
                            'phone' => 'required|max:10|regex:/(0)[0-9]{9}/',
                            'address' => 'required',
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
    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập tên',
            'email.required' => 'Bắt buộc nhập email',
            'email.email' => 'Định dạng email chưa đúng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.max' => 'Số điện thoại có tối đa :max chữ số',
            'phone.regex' => 'Định dạng số điện thoại chưa đúng',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ];
    }
}
