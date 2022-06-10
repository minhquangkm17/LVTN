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
            'email' =>'required',
            'full_name' => 'required|max:100',
            'number_phone' =>'required',
            'address' =>'required|max:10000',
            'password' =>'required|confirmed',
            'password_confirmation' =>'required',
        ];
    }

    public function messages()
    {
        return[
            'password.confirmed' =>'chưa khớp',
        ];
    }
}
