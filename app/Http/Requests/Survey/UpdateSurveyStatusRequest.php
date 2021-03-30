<?php

namespace App\Http\Requests\Survey;

use App\Enum\Survey\SurveyStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSurveyStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => [
                'required',
                Rule::in([SurveyStatusEnum::ACTIVE, SurveyStatusEnum::INACTIVE])
            ]
        ];
    }
}
