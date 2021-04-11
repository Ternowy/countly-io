<?php

declare(strict_types=1);

namespace App\Service\Survey;

use App\Enum\Survey\SurveyInputTypeEnum;
use App\Models\Survey\SurveyStructure;
use App\Models\Survey\SurveyStructureInput;
use Illuminate\Validation\Rule;

class SurveyInputValidationService
{
    public function extractValidationRules(SurveyStructure $surveyStructure): array
    {
        $rules = [];

        $surveyStructure->getInputs()->each(
            function (SurveyStructureInput $input) use (&$rules) {
                $inputRules = [];

                if ($input->isRequired()) {
                    array_push($inputRules, 'required');
                } else {
                    array_push($inputRules, 'nullable');
                }

                $additionalRules = match ($input->getType()) {
                    SurveyInputTypeEnum::TEXT => ['max:200'],
                    SurveyInputTypeEnum::TEXTAREA => ['max:1000'],
                    SurveyInputTypeEnum::CHECKBOX => ['array'],
                    //default for 2 cases SurveyInputTypeEnum::RADIO, SurveyInputTypeEnum::SELECT
                    default => [Rule::in($input->getOptions())]
                };

                if ($input->getType() === SurveyInputTypeEnum::CHECKBOX) {
                    $rules[$input->getName().'.*'] = [Rule::in($input->getOptions())];
                }

                $rules[$input->getName()] = array_merge($inputRules, $additionalRules);
            }
        );

        return $rules;
    }
}