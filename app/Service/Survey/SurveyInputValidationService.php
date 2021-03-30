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

        $surveyStructureInputs = $surveyStructure->getInputs();

        array_walk(
            $surveyStructureInputs,
            function (SurveyStructureInput $input) use (&$rules) {
                $inputRules = [];

                if ($input->isRequired()) {
                    array_push($inputRules, 'required');
                }

                $additionalRules = match ($input->getType()) {
                    SurveyInputTypeEnum::TEXT => ['string|max:255'],
                    SurveyInputTypeEnum::TEXTAREA => ['string|max:1000'],
                    SurveyInputTypeEnum::CHECKBOX => ['array'],
                    //default for 2 cases SurveyInputTypeEnum::RADIO, SurveyInputTypeEnum::SELECT
                    default => [Rule::in($input->getOptions())]
                };

                if ($input->getType() === SurveyInputTypeEnum::CHECKBOX) {
                    $rules[$input->getName() . '.*'] = [Rule::in($input->getOptions())];
                }

                $rules[$input->getName()] = array_merge($inputRules, $additionalRules);
            }
        );


        return $rules;
    }
}