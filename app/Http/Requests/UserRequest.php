<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'required|max:10',
            'email' =>'required|email',
            'full_name' => 'max:100',
            'number_phone' =>'required',
            'address' =>'required|max:10000',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Hãy nhập tên người dùng',
            'name.max' => 'Tên người dùng tối đa 10 kí tự',
            'email.required' => 'Hãy nhập email',
            'email.email' => 'Hãy nhập đúng định dạng email',
            'full_name.max' => 'Họ và tên tối đa 100 kí tự',
            'number_phone.required' => 'Hãy nhập số điện thoại',
            'address.required' => 'Hãy nhập địa chỉ'
        ];
    }
}
