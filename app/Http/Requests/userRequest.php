<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class userRequest extends Request
{
    protected $table='users';

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

        return $rules = [
            'name'    => 'required',
            'email'   => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
        
    }
}
