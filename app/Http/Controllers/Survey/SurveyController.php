<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\CreateSurveyRequest;
use App\Http\Requests\Survey\UpdateSurveyRequest;
use App\Http\Requests\Survey\UpdateSurveyStatusRequest;
use App\Models\Survey\Factory\SurveyStructureFactory;
use App\Models\Survey\Survey;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\SurveyDecorator;
use App\Service\Survey\SurveyService;
use App\Service\SurveyLimits\SurveyLimitsService;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    protected SurveyService $surveyService;

    protected SurveyRepository $surveyRepository;

    protected SurveyStructureFactory $surveyStructureFactory;

    protected SurveyDecorator $surveyDecorator;

    protected SurveyLimitsService $surveyLimitsService;

    public function __construct(
        SurveyService $surveyService,
        SurveyRepository $surveyRepository,
        SurveyStructureFactory $surveyStructureFactory,
        SurveyDecorator $surveyDecorator,
        SurveyLimitsService $surveyLimitsService
    ) {
        $this->surveyService = $surveyService;
        $this->surveyRepository = $surveyRepository;
        $this->surveyStructureFactory = $surveyStructureFactory;
        $this->surveyDecorator = $surveyDecorator;
        $this->surveyLimitsService = $surveyLimitsService;
    }

    public function surveys()
    {
        $user = Auth::user();

        $surveys = $this->surveyRepository->allOfUser($user)->map(
            function (Survey $survey) {
                return $this->surveyDecorator->decorate($survey);
            }
        );

        return view(
            'user.surveys',
            [
                'surveys' => $surveys->toArray(),
                'answersLimit' => $this->surveyLimitsService->getAnswersLimit($user),
                'answersNumber' => $this->surveyLimitsService->getAnswersStored($user)
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

        return view(
            'user.survey.builder',
            [
                'builderConfig' => [
                    'update-survey-uri' => route('update-survey', ['id' => $id]),
                    'survey-stats-uri' => route('survey-results', ['id' => $id]),
                    'survey-sharing-uri' => route('load-survey', ['code' => $survey->access_code]),
                    'home-uri' => route('surveys'),
                    'user-pic' => Auth::user()->avatar,
                    'mode' => 'edit',
                    'survey' => $survey->toArray()
                ]
            ]
        );
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
            (string)$request->get('description'),
            $this->surveyStructureFactory->createInstance(
                $request->get('structure')
            ),
            Auth::user()
        );
    }

    public function updateStatus(UpdateSurveyStatusRequest $request, $id)
    {
        return $this->surveyDecorator->decorate(
            $this->surveyService->updateStatus(
                (int)$id,
                $request->get('status'),
                Auth::user()
            )
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
