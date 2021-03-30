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
        return view(
            'user.survey.results',
            [
                'results' => $this->surveyResultsService->getResultsMap(
                    $this->surveyRepository->getById(Auth::user(), (int)$id)
                )
            ]
        );
    }

    public function media($id)
    {
    }
}
