<?php

declare(strict_types=1);

namespace App\Service\Survey\Shared;

use App\Models\Survey\Survey;
use App\Models\Survey\SurveyStructureInput;
use Illuminate\Support\Str;

class SurveyAnswerReadTimeEstimator
{
    public function estimate(Survey $survey): int
    {
        $totalEstimatedTime = 0;

        $survey->structure->getInputs()->each(
            function (SurveyStructureInput $input) use (&$totalEstimatedTime) {
                $totalEstimatedTime += $this->estimateReadTime($input->getLabel());
            }
        );

        return (int)$totalEstimatedTime;
    }

    protected function estimateReadTime(string $text): float
    {
        $words = Str::of($text)->explode(' ')->count();

        return ($words / 100) * 60;
    }
}