<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'txtMail'=>'required',
            'txtPass'=>'required'
        ];
    }
    public function message(){
        return [
            'txtMail.required'=>'Vui lòng nhập mail',
            'txtPass.required'=>'Vui lòng nhập Password'
        ];
    }
}
