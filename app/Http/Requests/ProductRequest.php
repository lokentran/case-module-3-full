<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3',
            'price'=>'required|min:1',
            'description'=>'required|min:10' 
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Tên sản phẩm không được để trống',
            'name.min'=>'Tên sản phẩm không được ít hơn 3 kí tự',

            'price.required'=>'Giá không được để trống',
            'price.min'=>'Giá không được tối thiểu 1 chữ số',

            'description.required'=>'Mô tả không được để trống',
            'description.min'=>'Mô tả không được ít hơn 10 kí tự'
        ];
    }
}
