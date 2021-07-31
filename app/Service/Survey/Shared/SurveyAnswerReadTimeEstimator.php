<?php

declare(strict_types=1);

namespace App\Service\Survey\Shared;

use App\Models\Survey\Survey;
use App\Models\Survey\SurveyStructureInput;
use Illuminate\Support\Str;

class SurveyAnswerReadTimeEstimator
{
    public function __construct()
    {
    }

    /**
     * For each input go through labels and count average word length and multiply with words amount
     */
    public function estimate(Survey $survey): int
    {
        $totalEstimatedTime = 0;

        $survey->structure->getInputs()->each(
            function (SurveyStructureInput $input) use (&$totalEstimatedTime) {
                $totalEstimatedTime += $this->estimateReadTime($input->getLabel());
            }
        );

        return $totalEstimatedTime;
    }

    protected function estimateReadTime(string $text): int
    {
        $words = Str::of(str_replace(['\'', '"', ',', ';', '<', '>'], '', $text))
            ->explode(' ')
            ->map(fn(string $word) => Str::length($word));

        $averageLength = $words->sum() / $words->count();

        return $this->estimateSentenceReadTime((int)$averageLength, $words->count());
    }

    protected function estimateSentenceReadTime(int $wordLength, int $wordsCount): int
    {
        return 1;
    }
}