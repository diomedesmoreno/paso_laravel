<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'name'  => 'required|string|max:50',
            // 'email' => 'required|unique:users|max:255',
            'email' => 'required|email|exists:email,id',
            'password'  => 'required|min:4|max:250',
            'gender' => 'nullable'
        ];
    }
}
