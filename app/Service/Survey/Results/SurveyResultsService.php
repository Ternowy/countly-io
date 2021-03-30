<?php

declare(strict_types=1);

namespace App\Service\Survey\Results;

use App\Models\Survey\Survey;
use App\Models\SurveyAnswer;

class SurveyResultsService
{
    protected SurveyAnswer $surveyAnswer;

    public function __construct(SurveyAnswer $surveyAnswer)
    {
        $this->surveyAnswer = $surveyAnswer;
    }

    public function clearSurveyResults(Survey $survey): ?bool
    {
        //TODO create cleanup job queue
        $this->surveyAnswer
            ->where('survey_id', $survey->getAttribute('id'))
            ->delete();
    }
}