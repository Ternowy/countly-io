<?php

declare(strict_types=1);

namespace App\Repository\Survey;

use App\Models\Survey\Survey;
use App\Models\SurveyAnswer\SurveyAnswer;
use App\Models\SurveyAnswer\SurveyAnswerInput;
use Illuminate\Support\Collection;

class SurveyAnswerRepository
{
    protected SurveyAnswer $surveyAnswer;

    protected SurveyAnswerInput $surveyAnswerInput;

    public function __construct(SurveyAnswer $surveyAnswer, SurveyAnswerInput $surveyAnswerInput)
    {
        $this->surveyAnswer = $surveyAnswer;
        $this->surveyAnswerInput = $surveyAnswerInput;
    }

    public function getSurveyQuestionInputs(Survey $survey, string $name): Collection
    {
        return $this->surveyAnswerInput->where(
            [
                'survey_id' => $survey->id,
                'input_name' => $name
            ]
        )->get();
    }
}