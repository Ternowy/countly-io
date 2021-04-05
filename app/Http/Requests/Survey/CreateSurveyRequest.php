<?php

namespace App\Http\Requests\Survey;

use App\Helper\Survey\SurveyEnumHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSurveyRequest extends FormRequest
{
    public function authorize(): bool
    {
        //TODO check limit
        return true;
    }

    public function rules(): array
    {
       return [
            'name' => 'required|max:100',
            'description' => 'required|max:280',
            'structure' => 'required|array|min:1|max:15',
            'structure.*.name' => 'required|max:32',
            'structure.*.required' => 'required|boolean',
            'structure.*.type' => [
                'required',
                Rule::in(
                    [
                        ...SurveyEnumHelper::inputsWithOptions(),
                        ...SurveyEnumHelper::inputsWithText()
                    ]
                )
            ],
            'structure.*.label' => 'required|max:100',
            'structure.*.placeholder' => 'present|max:100',
            'structure.*.options' => 'present|max:15'
        ];
    }
}
