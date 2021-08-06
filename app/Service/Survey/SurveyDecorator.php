<?php

declare(strict_types=1);

namespace App\Service\Survey;

use App\Models\Survey\Survey;

class SurveyDecorator
{
    public function decorate(Survey $survey, bool $sharingOnly = false): Survey
    {
        $routeData = ['id' => $survey->id];

        if (!$sharingOnly) {
            $survey->removeLink = route('delete-survey', $routeData);
            $survey->editLink = route('edit-survey', $routeData);
            $survey->resultsLink = route('survey-results', $routeData);
            $survey->updateStatusLink = route('update-survey-status', $routeData);
            $survey->clearResultsLink = route('clear-survey-results', $routeData);
            $survey->answersNumber = $survey->answers_count;
            $survey->surveyAnswersList = route('survey-results-list', $routeData);
        }
        $survey->submitSurveyUri = route('submit-survey', ['code' => $survey->access_code]);

        return $survey;
    }
}