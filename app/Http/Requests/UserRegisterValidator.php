<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterValidator extends FormRequest
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


    public function messages()
	{
		return [
			'password.required' => 'Please provide a password',
			'password.between' => 'The password must be between 5 and 50 characters long',

			'email.required' => 'Please provide an email address',
			'email.between' => 'The email must be between 5 and 250 characters long',
		];
	}

	/**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|between:5,250',
			'password' => 'required|string|between:5,50'
        ];
    }
}
