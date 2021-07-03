<?php

declare(strict_types=1);

namespace App\Http\Requests\Survey;

use Illuminate\Foundation\Http\FormRequest;

class SubmitSurveyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'answers' => 'required|array'
        ];
    }
}