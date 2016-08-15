<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignUpRequest extends Request
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
            'txtName'=>'required',
            'txtMail'=>'required',
            'txtPass'=>'required',
            'txtRePass'=>'required|same:txtPass',
        ];
    }
    public function messages(){
        return [
            'txtName.required'=>'Vui lòng nhập tên',
            'txtMail.required'=>'Vui lòng nhập mail',
            'txtPass.required'=>'Vui lòng nhập Password',
            'txtRePass.required'=>'Vui lòng nhập RePassword',
            'txtRePass.same' =>'Hai mật khẩu không trùng nhau',
        ];
    }
}
