<?php

namespace App\Http\Requests\Survey;

class EditSurveyRequest extends CreateSurveyRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

        ];
    }
}
