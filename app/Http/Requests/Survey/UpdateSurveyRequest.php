<?php

namespace App\Http\Requests\Survey;

class UpdateSurveyRequest extends CreateSurveyRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = parent::rules();

        return array_merge($rules, [
            'structure.*.name' => 'string|max:30'
        ]);
    }
}
