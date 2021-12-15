<?php

declare(strict_types=1);

namespace Database\Factories\SurveyAnswer;

use App\Models\SurveyAnswer\SurveyAnswerInput;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyAnswerInputFactory extends Factory
{
    protected $model = SurveyAnswerInput::class;

    public function definition()
    {
        return [
            'survey_id' => $this->faker->randomDigit,
            'answer_id' => $this->faker->randomDigit,
            'input_name' => $this->faker->word,
            'value' => json_encode([])
        ];
    }
}
