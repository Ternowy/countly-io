<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\CreateSurveyRequest;
use App\Http\Requests\Survey\EditSurveyRequest;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\SurveyService;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    protected SurveyService $surveyService;

    protected SurveyRepository $surveyRepository;

    public function __construct(SurveyService $surveyService, SurveyRepository $surveyRepository)
    {
        $this->surveyService = $surveyService;
        $this->surveyRepository = $surveyRepository;
    }

    public function surveys()
    {
        return view('user.surveys', [
            'surveys' => $this->surveyRepository->allOfUser(Auth::user())
        ]);
    }

    public function builder()
    {
        return view('user.survey.builder');
    }

    public function create(CreateSurveyRequest $request)
    {
        return $this->surveyService->create(
            [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'structure' => $request->get('structure'),
            ],
            Auth::user()
        );
    }

    public function edit(EditSurveyRequest $request, $id)
    {
        return $this->surveyService->update(
            (int)$id,
            [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'structure' => $request->get('structure')
            ],
            Auth::user()
        );
    }

    public function delete($id)
    {
    }

    public function clear($id)
    {
    }

}
