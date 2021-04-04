<?php

namespace App\Http\Requests\Survey;

class UpdateSurveyRequest extends CreateSurveyRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
