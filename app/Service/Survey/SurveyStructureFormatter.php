<?php

declare(strict_types=1);

namespace App\Service\Survey;

use App\Models\Survey\SurveyStructure;
use App\Models\Survey\SurveyStructureInput;
use App\Service\Common\UniqueIdService;

class SurveyStructureFormatter
{
    protected UniqueIdService $uniqueIdService;

    public function __construct(UniqueIdService $uniqueIdService)
    {
        $this->uniqueIdService = $uniqueIdService;
    }

    public function prepareStructure(SurveyStructure $surveyStructure): SurveyStructure
    {
        $surveyStructure->setInputs(
            array_map(
                function (SurveyStructureInput $input) {
                    if (empty($input->getName())) {
                        $input->setName(
                            $this->uniqueIdService->random()
                        );
                    }

                    return $input;
                },
                $surveyStructure->getInputs()
            )
        );

        return $surveyStructure;
    }
}