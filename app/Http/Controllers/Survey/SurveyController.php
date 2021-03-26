<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\CreateSurveyRequest;
use App\Http\Requests\Survey\EditSurveyRequest;
use App\Service\Survey\SurveyService;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    protected SurveyService $surveyService;

    public function __construct(SurveyService $surveyService)
    {
        $this->surveyService = $surveyService;
    }

    public function surveys()
    {
        return view('user.surveys');
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
    }

    public function delete($id)
    {
    }

    public function clear($id)
    {
    }

}
