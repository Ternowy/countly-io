<?php

declare(strict_types=1);

namespace App\Service\Survey;

use App\Enum\Survey\SurveyStatusEnum;
use App\Models\Survey\Survey;
use App\Models\Survey\SurveyStructure;
use App\Repository\Survey\SurveyRepository;
use App\Service\Common\UniqueIdService;
use App\Service\Survey\Results\SurveyResultsService;
use Illuminate\Contracts\Auth\Authenticatable;

class SurveyService
{
    protected Survey $survey;

    protected UniqueIdService $uniqueIdService;

    protected SurveyRepository $surveyRepository;

    protected SurveyResultsService $surveyResultsService;

    public function __construct(
        Survey $survey,
        UniqueIdService $uniqueIdService,
        SurveyRepository $surveyRepository,
        SurveyResultsService $surveyResultsService
    ) {
        $this->survey = $survey;
        $this->uniqueIdService = $uniqueIdService;
        $this->surveyRepository = $surveyRepository;
        $this->surveyResultsService = $surveyResultsService;
    }

    public function create(
        string $name,
        string $description,
        SurveyStructure $structure,
        $user
    ): Survey {
        return $this->survey->create(
            [
                'name' => $name,
                'description' => $description,
                'structure' => $structure,
                'created_by' => $user->id,
                'access_code' => $this->uniqueIdService->encode($user->id, rand(1, 10), rand(1, 10)),
                'status' => SurveyStatusEnum::ACTIVE,
            ]
        );
    }

    public function update(
        int $id,
        string $name,
        string $description,
        SurveyStructure $structure,
        Authenticatable $user
    ): Survey {
        $survey = $this->surveyRepository->getById($user, $id);

        $survey->fill(
            [
                'name' => $name,
                'description' => $description,
                'structure' => $structure
            ]
        );

        $survey->save();

        return $survey;
    }

    public function updateStatus(
        int $id,
        string $status,
        Authenticatable $user
    ): Survey {
        $survey = $this->surveyRepository->getById($user, $id);

        $survey->setAttribute('status', $status);

        $survey->save();

        return $survey;
    }

    public function delete(int $id, Authenticatable $user): ?bool
    {
        return $this->clearSurveyResults($id, $user)->delete();
    }

    public function clearSurveyResults(int $id, Authenticatable $user): Survey
    {
        $survey = $this->surveyRepository->getById($user, $id);

        $this->surveyResultsService->clearSurveyResults($survey);

        return $survey;
    }
}