<?php

declare(strict_types=1);

namespace Database\Factories\Survey;

use App\Enum\Survey\SurveyStatusEnum;
use App\Models\Survey\Survey;
use App\Models\Survey\SurveyStructure;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyFactory extends Factory
{
    protected $model = Survey::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'structure' => new SurveyStructure([], []),
            'access_code' => $this->faker->word,
            'status' => SurveyStatusEnum::ACTIVE,
            'created_by' => $this->faker->randomDigit
        ];
    }
}
