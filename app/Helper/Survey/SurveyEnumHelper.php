<?php

declare(strict_types=1);

namespace App\Helper\Survey;

use App\Enum\Survey\SurveyInputTypeEnum;

class SurveyEnumHelper
{
    public static function inputsWithOptions(): array
    {
        return [
            SurveyInputTypeEnum::RADIO,
            SurveyInputTypeEnum::CHECKBOX,
            SurveyInputTypeEnum::SELECT
        ];
    }

    public static function inputsWithText(): array
    {
        return [
            SurveyInputTypeEnum::TEXT,
            SurveyInputTypeEnum::TEXTAREA
        ];
    }
}