<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class ProductRequest extends FormRequest
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
                            'name' => 'required',
                            'price' => 'required',
                            // 'promotional_price' => 'lte:price',
                            'quantity' => 'required',
                            'feature_image' => 'required|image:jpg,bmp,png',
                            'description' => 'required',
                            'category_id' => 'required',
                            'slug' => 'unique:products,slug',
                        ];
                        break;
                    case 'update':
                        $id = $request->id;
                        $rules = [
                            'name' => 'required',
                            'price' => 'required',
                            // 'promotional_price' => 'lte:price',
                            'quantity' => 'required',
                            // 'feature_image' => 'required|image:jpg,bmp,png',
                            'description' => 'required',
                            'category_id' => 'required',
                            'slug' => 'unique:products,slug|unique:products,slug,'.$id,
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
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'price.required' => 'Bạn chưa nhập giá',
            // 'price.numberic' => 'Giá san phẩm phải là 1 số',
            // 'promotional_price.Lte' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'quantity.required' => 'Bạn chưa nhập số lượng sản phẩm',
            'feature_image.required' => 'Bạn chưa chọn ảnh đại diện sản phẩm',
            'feature_image.image' => 'Định dạng hình ảnh chưa chính xác',
            'description.required' => 'Bạn chưa nhập mô tả cho sản phẩm',
            'category_id.required' => 'Bạn chưa chọn danh mục sản phẩm',
            'slug.unique' => 'Slug đã tồn tại',
        ];
    }
}
