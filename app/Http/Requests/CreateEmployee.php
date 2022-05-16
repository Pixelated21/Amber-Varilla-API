<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployee extends FormRequest
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
            'dept_id' => 'required',
          'position_id' =>'required',
          'email' => 'required',
          'password' => 'required',
          'salary' => 'required',
          'firstName' => 'required',
          'lastName'=> 'required',
        ];
    }
}
