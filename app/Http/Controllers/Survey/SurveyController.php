<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\CreateSurveyRequest;
use App\Http\Requests\Survey\UpdateSurveyRequest;
use App\Http\Requests\Survey\UpdateSurveyStatusRequest;
use App\Models\Survey\Factory\SurveyStructureFactory;
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
        return view(
            'user.surveys',
            [
                'surveys' => $this->surveyRepository->allOfUser(Auth::user())->toArray()
            ]
        );
    }

    public function builder()
    {
        return view(
            'user.survey.builder',
            [
                'builderConfig' => [
                    'create-survey-uri' => route('create-survey'),
                    'home-uri' => route('surveys'),
                    'user-pic' => Auth::user()->avatar,
                    'mode' => 'create'
                ]
            ]
        );
    }

    public function edit($id)
    {
        return view('user.survey.builder', [
            'builderConfig' => [
                'update-survey-uri' => route('update-survey', ['id' => $id]),
                'home-uri' => route('surveys'),
                'user-pic' => Auth::user()->avatar,
                'mode' => 'edit',
                'survey' => $this->surveyRepository->getById(Auth::user(), $id, true)->toArray()
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
