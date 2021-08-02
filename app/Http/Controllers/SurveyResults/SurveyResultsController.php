<?php

namespace App\Http\Controllers\SurveyResults;

use App\Http\Controllers\Controller;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\Results\SurveyResultsService;
use App\Service\Survey\SurveyDecorator;
use App\Service\SurveyLimits\SurveyLimitsService;
use Illuminate\Support\Facades\Auth;

class SurveyResultsController extends Controller
{
    protected SurveyRepository $surveyRepository;

    protected SurveyResultsService $surveyResultsService;

    protected SurveyLimitsService $surveyLimitsService;

    protected SurveyDecorator $surveyDecorator;

    public function __construct(
        SurveyRepository $surveyRepository,
        SurveyResultsService $surveyResultsService,
        SurveyLimitsService $surveyLimitsService,
        SurveyDecorator $surveyDecorator
    ) {
        $this->surveyRepository = $surveyRepository;
        $this->surveyResultsService = $surveyResultsService;
        $this->surveyLimitsService = $surveyLimitsService;
        $this->surveyDecorator = $surveyDecorator;
    }

    public function results($id)
    {
        $user = Auth::user();
        $survey = $this->surveyDecorator->decorate(
            $this->surveyRepository->getById($user, (int)$id, true)
        );

        return view(
            'user.survey.results',
            [
                'survey' => $survey->toArray(),
                'results' => $this->surveyResultsService->getResultsCollection($survey)->toArray(),
                'answersLimit' => $this->surveyLimitsService->getAnswersLimit($user),
                'answersNumber' => $this->surveyLimitsService->getAnswersStored($user),
                'totalAnswers' => $survey->answers()->count()
            ]
        );
    }

    public function resultsList($surveyId)
    {
        $user = Auth::user();
        $survey = $this->surveyRepository->getById($user, (int)$surveyId, true);
        return $this->surveyResultsService->getResultsBuilder($survey)->paginate(30);
    }
}
