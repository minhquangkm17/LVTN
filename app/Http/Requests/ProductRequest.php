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
            'product_name' =>'required',
            'product_price' =>'required|integer',
            'discount' => 'between:1,100',
            'product_decription' =>'required',
            'product_spec' =>'required',
            'product_img' =>'image|required|max:10000',
            'product_slug' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'category_name.required' => 'Hãy nhập tên sản phẩm',
            'product_price.required' => 'Hãy nhập giá sản phẩm',
            'product_price.integer' => 'Giá bán phải là một số dương',
            'product_decription.required' => 'Hãy nhập mô tả sản phẩm',
            'product_spec.required' => 'Hãy nhập thông số sản phẩm',
            'product_img.image' => 'Dữ liệu không phải dạng ảnh',
            'product_img.required' => 'Hãy chèn ảnh sản phẩm',
            'product_img.max' => 'Ảnh tối đa 10Mb',
            'discount.between' => 'Discount phải trong khoảng 1% đến 100%'
        ];
    }
}
