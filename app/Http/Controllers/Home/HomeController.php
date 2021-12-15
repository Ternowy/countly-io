<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\Results\SurveyResultsService;
use App\Service\Survey\SurveyDecorator;

class HomeController extends Controller
{
    protected SurveyRepository $surveyRepository;

    protected SurveyDecorator $surveyDecorator;

    protected SurveyResultsService $surveyResultsService;

    public function __construct(
        SurveyRepository $surveyRepository,
        SurveyDecorator $surveyDecorator,
        SurveyResultsService $surveyResultsService
    ) {
        $this->surveyRepository = $surveyRepository;
        $this->surveyDecorator = $surveyDecorator;
        $this->surveyResultsService = $surveyResultsService;
    }

    public function home()
    {
        $survey = $this->surveyRepository->getByCode('yPfrfn');

        return view(
            'home',
            [
                'welcomeSurvey' => $this->surveyDecorator->decorate($survey, true)->toArray(),
                'welcomeSurveyResults' => array_slice(
                    $this->surveyResultsService->getResultsCollection($survey)->toArray(),
                    0,
                    2
                )
            ]
        );
    }
}
