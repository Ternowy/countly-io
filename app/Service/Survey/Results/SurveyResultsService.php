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

    public function getResultsMap(Survey $survey): array
    {
        //TODO complete this
        /*
         * [
         *  [
         *     'title' => 'bla bla bla',
         *     'type' => 'STATS TYPE',
         *     'answers_number' => 400,
         *     'answers' => [
         *          if (text)
         *              'bla BLA',
         *              'BLA BLA',
         *          else
                        'option1' => 10,
                        'option2' => 20,
               ]
         *  ]
         * ]
         *
         */

        $answers = $this->surveyAnswer->where('survey_id', $survey->getAttribute('id'));

        return [];
    }

    public function clearSurveyResults(Survey $survey): ?bool
    {
        //TODO create cleanup job queue
        return (bool)$this->surveyAnswer
            ->where('survey_id', $survey->getAttribute('id'))
            ->delete();
    }
}