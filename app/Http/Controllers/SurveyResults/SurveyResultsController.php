<?php

namespace App\Http\Controllers\SurveyResults;

use App\Http\Controllers\Controller;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\Results\SurveyResultsService;
use Illuminate\Support\Facades\Auth;

class SurveyResultsController extends Controller
{
    protected SurveyRepository $surveyRepository;

    protected SurveyResultsService $surveyResultsService;

    public function __construct(
        SurveyRepository $surveyRepository,
        SurveyResultsService $surveyResultsService
    ) {
        $this->surveyRepository = $surveyRepository;
        $this->surveyResultsService = $surveyResultsService;
    }

    public function results($id)
    {
        $survey = $this->surveyRepository->getById(Auth::user(), (int)$id);

        return view(
            'user.survey.results',
            [
                'survey' => $survey->toArray(),
                'results' => $this->surveyResultsService->getResultsCollection($survey)->toArray(),
            ]
        );
    }

    public function media($id)
    {
    }
}
