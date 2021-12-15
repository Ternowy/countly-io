<?php

declare(strict_types=1);

namespace App\Service\SurveyLimits;

use App\Models\User;
use App\Repository\Survey\SurveyRepository;

class SurveyLimitsService
{
    private SurveyRepository $surveyRepository;

    public function __construct(SurveyRepository $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function getAnswersLimit(User $user): int
    {
        return 5000;
    }

    public function getAnswersStored(User $user): int
    {
        return $this->surveyRepository->allOfUser($user)->sum('answers_count');
    }
}