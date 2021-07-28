<?php

declare(strict_types=1);

namespace App\Service\Survey\Shared;

use App\Models\Survey\Survey;
use App\Models\SurveyAnswer\SurveyAnswer;
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

        $surveyAnswer = $this->surveyAnswer->create(
            [
                'survey_id' => $survey->id,
                'ip_address' => $ip
            ]
        );

        $surveyAnswer->inputs()->createMany(
            $this->prepareAnswersToSave($answers, $survey->id)
        );

        return $surveyAnswer;
    }

    private function prepareAnswersToSave(array $answers, int $surveyId): array
    {
        $preparedAnswers = [];

        foreach ($answers as $inputName => $value) {
            if (!empty($value)) {
                $preparedAnswers[] = [
                    'survey_id' => $surveyId,
                    'input_name' => $inputName,
                    'value' => $value
                ];
            }
        }

        return $preparedAnswers;
    }
}