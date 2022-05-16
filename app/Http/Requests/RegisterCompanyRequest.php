<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCompanyRequest extends FormRequest
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
        'companyName' => 'required|string|max:255|unique:companies,companyName',
        'email' => 'required|string|email|max:255|unique:company_admins,email|unique:company_details,companyEmail|unique:company_employees,email|unique:users,email',
        'password' => 'required|string|min:4',
        'companyEmail' => 'required|string|email|max:255|unique:company_details,companyEmail',
        'companyWebsite' => 'required|string|max:255',
        'companyAddress' => 'required|string|max:255',
        'companyCountry' => 'required|string|max:255',
        'companyContact' => 'required|string|max:255',
        ];
    }
}
