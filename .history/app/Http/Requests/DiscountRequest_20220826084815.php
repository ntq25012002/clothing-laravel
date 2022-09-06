<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class DiscountRequest extends FormRequest
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
                            "name" => 'required|regex:/^\S*$/u|unique:discounts',
                        ];
                        break;
                    case 'update':
                        $id = $request->id;
                        $rules = [
                            "name" => 'required|regex:/^\S*$/u|unique:discounts,'.$id,
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
            "name.regex" => 'Không được tồn tại khoản trống',
            "name.required" => 'Vui lòng nhập mã khuyến mại',
            "name.unique" => 'Mã khuyến mại đã tồn tại',
        ];
    }
}
