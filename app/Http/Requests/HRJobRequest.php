<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HRJobRequest extends FormRequest
{

    protected array $modality = ['On-Site','Remote'];
    protected array $type = ['Part Time','Full Time'];

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

            'category_id' => 'required',
            'jobTitle' => 'required|string',
            'jobDescription' => 'required|string',
            'jobSalary' => 'required|integer',
            'jobType' => 'required',Rule::in($this->type),
            'jobModality' => 'required',Rule::in($this->modality),
            'negotiable' => 'required|boolean',
        ];
    }
}
