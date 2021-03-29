<?php

declare(strict_types=1);

namespace App\Service\Survey;

use App\Enum\Survey\SurveyStatusEnum;
use App\Models\Survey;
use App\Repository\Survey\SurveyRepository;
use App\Service\Common\UniqueIdService;
use Illuminate\Contracts\Auth\Authenticatable;

class SurveyService
{
    protected Survey $survey;

    protected UniqueIdService $uniqueIdService;

    protected SurveyRepository $surveyRepository;

    public function __construct(Survey $survey, UniqueIdService $uniqueIdService, SurveyRepository $surveyRepository)
    {
        $this->survey = $survey;
        $this->uniqueIdService = $uniqueIdService;
        $this->surveyRepository = $surveyRepository;
    }

    public function create(array $data, $user): Survey
    {
        return $this->survey->create(
            array_merge(
                $data,
                [
                    'created_by' => $user->id,
                    'access_code' => $this->uniqueIdService->encode(1, 2, 3),
                    'status' => SurveyStatusEnum::ACTIVE,
                ]
            )
        );
    }

    public function update(int $id, array $data, Authenticatable $user): Survey
    {
        $survey = $this->surveyRepository->getById($user, $id);

        $survey->fill($data);

        $survey->save();

        return $survey;
    }
}