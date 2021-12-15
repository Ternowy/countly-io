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
    public function test_can_create(): void
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

        $newlyCreatedSurvey = $this
            ->getInstance($survey, $uniqueIdService)
            ->create($surveyName, $surveyDescription, $structure, $user);

        $this->assertInstanceOf(Survey::class, $newlyCreatedSurvey);
        $this->assertSame($code, $newlyCreatedSurvey->access_code);
    }

    public function test_can_update(): void
    {
        $user = User::factory()->make();
        $survey = Survey::factory()->create();
        $surveyName = 'foo';
        $structure = new SurveyStructure([], []);

        $surveyRepository = \Mockery::mock(SurveyRepository::class);
        $surveyRepository->shouldReceive('getById')->with($user, $survey->id)->once()->andReturn($survey);

        $updatedSurvey = $this
            ->getInstance(null, null, $surveyRepository)
            ->update(
                $survey->id,
                $surveyName,
                'description',
                $structure,
                $user
            );

        $this->assertSame($surveyName, $updatedSurvey->name, 'Survey name mismatch');
        $this->assertSame($structure, $survey->structure, 'Structure mismatch');
    }

    public function test_can_update_status(): void
    {
        $user = User::factory()->make();
        $survey = Survey::factory()->create();
        $surveyRepository = \Mockery::mock(SurveyRepository::class);
        $surveyRepository->shouldReceive('getById')->with($user, $survey->id)->once()->andReturn($survey);
        $surveyWithUpdatedStatus = $this
            ->getInstance(null, null, $surveyRepository)
            ->updateStatus($survey->id, SurveyStatusEnum::INACTIVE, $user);

        $this->assertSame(SurveyStatusEnum::INACTIVE, $surveyWithUpdatedStatus->status, 'status mismatch');
    }

    public function test_can_delete(): void
    {
        $user = User::factory()->make();
        $survey = Survey::factory()->create();
        $surveyRepository = \Mockery::mock(SurveyRepository::class);
        $surveyRepository->shouldReceive('getById')->with($user, $survey->id)->once()->andReturn($survey);
        $surveyResultsService = \Mockery::mock(SurveyResultsService::class);
        $surveyResultsService->shouldReceive('clearSurveyResults')->with($survey)->once();

        $this
            ->getInstance(null, null, $surveyRepository, $surveyResultsService)
            ->delete($survey->id, $user);

        $this->assertSoftDeleted($survey);
    }

    public function test_can_clear_results(): void
    {
        $user = User::factory()->make();
        $survey = Survey::factory()->create();
        $surveyRepository = \Mockery::mock(SurveyRepository::class);
        $surveyRepository->shouldReceive('getById')->with($user, $survey->id)->once()->andReturn($survey);
        $surveyResultsService = \Mockery::mock(SurveyResultsService::class);
        $surveyResultsService->shouldReceive('clearSurveyResults')->with($survey)->once();

        $this
            ->getInstance(null, null, $surveyRepository, $surveyResultsService)
            ->clearSurveyResults($survey->id, $user);

        $this->assertInstanceOf(Survey::class, $survey);
    }

    private function getInstance(
        ?Survey $survey = null,
        ?UniqueIdService $uniqueIdService = null,
        ?SurveyRepository $surveyRepository = null,
        ?SurveyResultsService $surveyResultsService = null
    ): SurveyService {
        return new SurveyService(
            $survey ?? \Mockery::mock(Survey::class),
            $uniqueIdService ?? \Mockery::mock(UniqueIdService::class),
            $surveyRepository ?? \Mockery::mock(SurveyRepository::class),
            $surveyResultsService ?? \Mockery::mock(SurveyResultsService::class)
        );
    }
}
