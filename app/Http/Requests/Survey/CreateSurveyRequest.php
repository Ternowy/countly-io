<?php

namespace App\Http\Requests\Survey;

use App\Helper\Survey\SurveyEnumHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSurveyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       return [
            'name' => 'required|max:100',
            'description' => 'nullable|max:280',
            'structure.ctaButton.label' => 'required|max:24',
            'structure.inputs' => 'required|array|min:1|max:15',
            'structure.inputs.*.name' => 'required|max:32',
            'structure.inputs.*.required' => 'required|boolean',
            'structure.inputs.*.type' => [
                'required',
                Rule::in(
                    [
                        ...SurveyEnumHelper::inputsWithOptions(),
                        ...SurveyEnumHelper::inputsWithText()
                    ]
                )
            ],
            'structure.inputs.*.label' => 'required|max:100',
            'structure.inputs.*.placeholder' => 'present|max:100',
            'structure.inputs.*.options' => 'present|max:15'
        ];
    }
}
