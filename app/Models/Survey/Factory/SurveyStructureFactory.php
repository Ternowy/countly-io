<?php

declare(strict_types=1);

namespace App\Models\Survey\Factory;

use App\Models\Survey\SurveyStructure;

class SurveyStructureFactory
{
    public function createInstance(array $data): SurveyStructure
    {
        return new SurveyStructure($data['inputs'], $data['ctaButton']);
    }
}