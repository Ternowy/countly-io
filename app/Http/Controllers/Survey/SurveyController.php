<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\CreateSurveyRequest;
use App\Http\Requests\Survey\UpdateSurveyRequest;
use App\Http\Requests\Survey\UpdateSurveyStatusRequest;
use App\Models\Survey\Factory\SurveyStructureFactory;
use App\Models\Survey\Survey;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\SurveyService;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    protected SurveyService $surveyService;

    protected SurveyRepository $surveyRepository;

    protected SurveyStructureFactory $surveyStructureFactory;

    public function __construct(
        SurveyService $surveyService,
        SurveyRepository $surveyRepository,
        SurveyStructureFactory $surveyStructureFactory
    ) {
        $this->surveyService = $surveyService;
        $this->surveyRepository = $surveyRepository;
        $this->surveyStructureFactory = $surveyStructureFactory;
    }

    public function surveys()
    {
        $surveys = $this->surveyRepository->allOfUser(Auth::user())->each(function (Survey $survey) {
            $survey->removeLink = route('delete-survey', ['id' => $survey->id]);
            $survey->editLink = route('edit-survey', ['id' => $survey->id]);
            $survey->resultsLink = route('survey-results', ['id' => $survey->id]);
            $survey->answersNumber = $survey->answers_count;
        });

        return view(
            'user.surveys',
            [
                'surveys' => $surveys->toArray(),
                'answersLimit' => 5000,
                'answersNumber' => 4000
            ]
        );
    }

    public function builder()
    {
        return view(
            'user.survey.builder',
            [
                'builderConfig' => [
                    'create-survey-uri' => route('save-survey'),
                    'home-uri' => route('surveys'),
                    'user-pic' => Auth::user()->avatar,
                    'mode' => 'create'
                ]
            ]
        );
    }

    public function edit($id)
    {
        $survey = $this->surveyRepository->getById(Auth::user(), $id, true);

        return view('user.survey.builder', [
            'builderConfig' => [
                'update-survey-uri' => route('update-survey', ['id' => $id]),
                'survey-stats-uri' => route('survey-results', ['id' => $id]),
                'survey-sharing-uri' => route('load-survey', ['code' => $survey->access_code]),
                'home-uri' => route('surveys'),
                'user-pic' => Auth::user()->avatar,
                'mode' => 'edit',
                'survey' => $survey->toArray()
            ]
        ]);
    }

    public function create(CreateSurveyRequest $request)
    {
        return $this->surveyService->create(
            $request->get('name'),
            $request->get('description'),
            $this->surveyStructureFactory->createInstance(
                $request->get('structure')
            ),
            Auth::user()
        );
    }

    public function update(UpdateSurveyRequest $request, $id)
    {
        return $this->surveyService->update(
            (int)$id,
            $request->get('name'),
            $request->get('description'),
            $this->surveyStructureFactory->createInstance(
                $request->get('structure')
            ),
            Auth::user()
        );
    }

    public function updateStatus(UpdateSurveyStatusRequest $request, $id)
    {
        return $this->surveyService->updateStatus(
            (int)$id,
            $request->get('status'),
            Auth::user()
        );
    }

    public function delete($id)
    {
        return $this->surveyService->delete((int)$id, Auth::user());
    }

    public function clear($id)
    {
        return $this->surveyService->clearSurveyResults((int)$id, Auth::user());
    }

}
