<?php

declare(strict_types=1);

namespace App\Service\Survey\Shared;

use App\Models\Survey\Survey;
use App\Models\SurveyAnswer;
use App\Service\Survey\SurveyInputValidationService;
use Illuminate\Support\Facades\Validator;

class SharedSurveyService
{
    protected SurveyInputValidationService $inputValidationService;

    protected SurveyAnswer $surveyAnswer;

    public function __construct(
        SurveyInputValidationService $inputValidationService,
        SurveyAnswer $surveyAnswer
    ) {
        $this->inputValidationService = $inputValidationService;
        $this->surveyAnswer = $surveyAnswer;
    }

    public function answer(Survey $survey, array $answers, string $ip): SurveyAnswer
    {
        Validator::validate(
            $answers,
            $this->inputValidationService->extractValidationRules(
                $survey->getAttribute('structure')
            )
        );

        return $this->surveyAnswer->create(
            [
                'survey_id' => $survey->getAttribute('id'),
                'answer' => $answers,
                'ip_address' => $ip
            ]
        );
    }
}