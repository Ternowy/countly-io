<?php

declare(strict_types=1);

namespace App\Service\Survey;

use App\Enum\Survey\SurveyStatusEnum;
use App\Models\Survey;
use App\Models\User;
use App\Service\Common\UniqueIdService;

class SurveyService
{
    protected Survey $survey;

    protected UniqueIdService $uniqueIdService;

    public function __construct(Survey $survey, UniqueIdService $uniqueIdService)
    {
        $this->survey = $survey;
        $this->uniqueIdService = $uniqueIdService;
    }

    public function create(array $data, User $user): Survey
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
}