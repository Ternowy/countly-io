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
        return view('survey.survey', [
            'survey' => $this->surveyRepository->getByCode($code)
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
