<?php

declare(strict_types=1);

namespace Database\Factories\SurveyAnswer;

use App\Models\SurveyAnswer\SurveyAnswer;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyAnswerFactory extends Factory
{
    protected $model = SurveyAnswer::class;

    public function definition()
    {
        return [
            'survey_id' => $this->faker->randomDigit,
            'ip_address' => $this->faker->ipv4
        ];
    }
}
