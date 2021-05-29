<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\SubmitSurveyRequest;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\Shared\SharedSurveyService;
use App\Service\Survey\SurveyDecorator;

class SharedSurveyController extends Controller
{
    protected SharedSurveyService $sharedSurveyService;

    protected SurveyRepository $surveyRepository;

    protected SurveyDecorator $surveyDecorator;

    public function __construct(
        SharedSurveyService $sharedSurveyService,
        SurveyRepository $surveyRepository,
        SurveyDecorator $surveyDecorator
    ) {
        $this->sharedSurveyService = $sharedSurveyService;
        $this->surveyRepository = $surveyRepository;
        $this->surveyDecorator = $surveyDecorator;
    }

    public function load($code)
    {
        $survey = $this->surveyRepository->getByCode(
            $code,
            ['structure', 'name', 'description', 'access_code']
        );

        if (empty($survey)) {
            return view('survey.notfound');
        }

        return view('survey.survey', [
            'survey' => $this->surveyDecorator->decorate($survey, true)->toArray()
        ]);
    }

    public function submit(SubmitSurveyRequest $request, $code)
    {
        $answer = $this->sharedSurveyService->answer(
            $this->surveyRepository->getByCode($code),
            $request->get('answers'),
            $request->ip()
        );

        return view('survey.success', [
            'answer' => $answer
        ]);
    }
}
