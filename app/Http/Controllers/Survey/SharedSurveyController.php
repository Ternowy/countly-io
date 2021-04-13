<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\SubmitSurveyRequest;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\Shared\SharedSurveyService;

class SharedSurveyController extends Controller
{
    protected SharedSurveyService $sharedSurveyService;

    protected SurveyRepository $surveyRepository;

    public function __construct(
        SharedSurveyService $sharedSurveyService,
        SurveyRepository $surveyRepository
    ) {
        $this->sharedSurveyService = $sharedSurveyService;
        $this->surveyRepository = $surveyRepository;
    }

    public function load($code)
    {
        $survey = $this->surveyRepository->getByCode(
            $code,
            ['structure', 'name', 'description', 'access_code']
        );

        $survey->submitSurveyUri = route('submit-survey', ['code' => $survey->getAttribute('access_code')]);

        return view('survey.survey', [
            'survey' => $survey->toArray()
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
