<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterHandlerRequest extends FormRequest
{

    protected array $gender = ['Male','Female'];
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

            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'sex' => ['required',Rule::in($this->gender)],
            'birthDate' => 'required|date',
            'email' => 'required|email|unique:users,email|unique:company_employees,email',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required|string|min:4'


        ];
    }

    public function messages()
    {
        return [
//            'firstname.required' => "User's first name is required",
//            'lastname.required' => "User's last name is required",
//            'sex.required' => "User's gender is required",
//            'birthDate.required' => "User's date of birth is required",
//            'username.required' => 'Username is required',
//            'email.required' => 'Email is required',
//            'password.required' => 'Password is required',
//            'password_confirmation.required' => 'Password Confirmation is required',

        ];
    }
}
