<?php

declare(strict_types=1);

namespace App\Service\Survey\Shared;

use App\Models\Survey\Survey;

class SurveyAnswerQualityService
{
    public const QUALITY_GOOD = 10;
    public const QUALITY_MEDIUM = 5;
    public const QUALITY_LOW = 1;

    protected SurveyAnswerReadTimeEstimator $readTimeEstimator;

    public function __construct(SurveyAnswerReadTimeEstimator $readTimeEstimator)
    {
       $this->readTimeEstimator = $readTimeEstimator;
    }

    public function getQuality(Survey $survey, int $inputTime): int
    {
        $qualityProportion = $this->getQualityProportion($survey, $inputTime);

        if ($qualityProportion >= 0.8) {
            return self::QUALITY_GOOD;
        } elseif ($qualityProportion >= 0.4) {
            return self::QUALITY_MEDIUM;
        } else {
            return self::QUALITY_LOW;
        }
    }

    protected function getQualityProportion(Survey $survey, int $inputTime): float
    {
        return $inputTime / $this->readTimeEstimator->estimate($survey);
    }
}