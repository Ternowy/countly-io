<?php

declare(strict_types=1);

namespace App\Service\Survey\Shared;

use App\Models\Survey\Survey;
use App\Models\SurveyAnswer\SurveyAnswer;
use App\Service\Survey\SurveyInputValidationService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class SharedSurveyService
{
    protected SurveyInputValidationService $inputValidationService;

    protected SurveyAnswer $surveyAnswer;

    protected SurveyAnswerQualityService $surveyAnswerQualityService;

    public function __construct(
        SurveyInputValidationService $inputValidationService,
        SurveyAnswer $surveyAnswer,
        SurveyAnswerQualityService $surveyAnswerQualityService
    ) {
        $this->inputValidationService = $inputValidationService;
        $this->surveyAnswer = $surveyAnswer;
        $this->surveyAnswerQualityService = $surveyAnswerQualityService;
    }

    public function answer(Survey $survey, array $answers, string $ip, int $surveyStartedAt): SurveyAnswer
    {
        Validator::validate(
            $answers,
            $this->inputValidationService->extractValidationRules(
                $survey->getAttribute('structure')
            )
        );

        //todo transaction
        $surveyAnswer = $this->surveyAnswer->create(
            [
                'survey_id' => $survey->id,
                'ip_address' => $ip
            ]
        );

        $surveyAnswer->inputs()->createMany(
            $this->prepareAnswersToSave($answers, $survey->id)
        );

        $inputTime = Carbon::now()->unix() - $surveyStartedAt;

        $surveyAnswer->quality()->create([
            'quality_rating' => $this->surveyAnswerQualityService->getQuality($survey, $inputTime),
            'input_time' => $inputTime
        ]);

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