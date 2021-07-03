<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enum\Survey\SurveyStatusEnum;
use App\Models\Survey\Factory\SurveyStructureFactory;
use App\Models\Survey\Survey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class WelcomeSurveySeeder extends Seeder
{
    private SurveyStructureFactory $surveyStructureFactory;

    public function __construct(SurveyStructureFactory $surveyStructureFactory)
    {
        $this->surveyStructureFactory = $surveyStructureFactory;
    }

    public function run()
    {
        $surveyData = Storage::disk('content')->get('welcome-survey.json');

        Survey::create(
            [
                'id' => 1,
                'name' => 'Welcome to ' . config('app.name'),
                'description' => 'Tell us, how did you come here',
                'structure' => $this->surveyStructureFactory->createInstance(json_decode($surveyData, true)),
                'created_by' => 1,
                'access_code' => 'yPfrfn',
                'status' => SurveyStatusEnum::ACTIVE,
            ]
        );
    }
}
