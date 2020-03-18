<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:3',
                'confirmed',
            ],
        ];
    }

    public function messages() {
        return [
            'name.required' => __('Name required'),
            'name.string' => __('Invalid name'),
            'name.min' => __('Name length should be more than 3'),
            'email.required' => __('Email required'),
            'email.email' => __('Invalid email'),
            'email.unique' => __('Email is already busy'),
            'password.required' => __('Password required'),
            'password.string' => __('Invalid password'),
            'password.min' => __('Too short password (min 3 symbols)'),
            'password.confirmed' => __('Invalid password confirmation'),
        ];
    }

}
