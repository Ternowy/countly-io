<?php

declare(strict_types=1);

namespace Tests\Unit\Service\Survey;

use App\Enum\Survey\SurveyStatusEnum;
use App\Models\Survey\Survey;
use App\Models\Survey\SurveyStructure;
use App\Models\User;
use App\Service\Common\UniqueIdService;
use App\Service\Survey\SurveyService;
use App\Repository\Survey\SurveyRepository;
use App\Service\Survey\Results\SurveyResultsService;
use Tests\TestCase;

class SurveyServiceTest extends TestCase
{
    public function test_can_create()
    {
        $structure = new SurveyStructure([], []);
        $user = User::factory()->make();
        $surveyName = 'foo';
        $surveyDescription = 'bar';
        $code = 'foo';
        $createdSurvey = Survey::factory()->make();

        $uniqueIdService = \Mockery::mock(UniqueIdService::class);
        $uniqueIdService->shouldReceive('encode')->andReturn($code);

        $survey = \Mockery::mock(Survey::class)->makePartial();
        $survey->shouldReceive('create')->withArgs(
            function (array $data) use ($structure, $user, $surveyDescription, $surveyName) {
                $this->assertSame(
                    [
                        'name' => $surveyName,
                        'description' => $surveyDescription,
                        'structure' => $structure,
                        'created_by' => $user->id,
                        'access_code' => '',
                        'status' => SurveyStatusEnum::ACTIVE,
                    ],
                    $data
                );
                return true;
            }
        )->andReturn($createdSurvey);

        $service = new SurveyService(
            $survey,
            $uniqueIdService,
            \Mockery::mock(SurveyRepository::class),
            \Mockery::mock(SurveyResultsService::class)
        );

        $newlyCreatedSurvey = $service->create($surveyName, $surveyDescription, $structure, $user);
        $this->assertInstanceOf(Survey::class, $newlyCreatedSurvey);
        $this->assertSame($code, $newlyCreatedSurvey->access_code);
    }
}
