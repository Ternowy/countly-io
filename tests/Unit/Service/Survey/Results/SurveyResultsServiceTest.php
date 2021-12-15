<?php

declare(strict_types=1);

namespace Tests\Unit\Service\Survey\Results;

use App\Models\Survey\Survey;
use App\Models\Survey\SurveyStructure;
use App\Models\SurveyAnswer\SurveyAnswer;
use App\Models\SurveyAnswer\SurveyAnswerInput;
use App\Repository\Survey\SurveyAnswerRepository;
use App\Service\Survey\Results\SurveyResultsService;
use Illuminate\Support\Collection;
use Tests\TestCase;
use App\Enum\Survey\SurveyInputTypeEnum;

class SurveyResultsServiceTest extends TestCase
{
    public function test_can_get_results(): void
    {
        $inputs = [
            [
                'name' => 'test',
                'type' => SurveyInputTypeEnum::TEXT,
                'label' => 'Test',
                'options' => [],
                'placeholder' => 'test',
                'required' => true,
            ]
        ];
        $survey = Survey::factory()->make(['structure' => new SurveyStructure($inputs, [])]);
        $answers = [
            SurveyAnswerInput::factory()->make(
                [
                    'survey_id' => $survey->id,
                    'input_name' => 'test',
                    'value' => json_encode('foo-bar')
                ]
            )
        ];

        $surveyAnswer = \Mockery::mock(SurveyAnswer::class);
        $surveyAnswerRepository = \Mockery::mock(SurveyAnswerRepository::class);
        $surveyAnswerRepository
            ->shouldReceive('getSurveyQuestionInputs')
            ->with($survey, 'test')
            ->once()
            ->andReturn(new Collection($answers));

        $collection = (new SurveyResultsService($surveyAnswer, $surveyAnswerRepository))->getResultsCollection($survey);

        $this->assertSame(
            [
                'test' => [
                    'label' => 'Test',
                    'type' => SurveyInputTypeEnum::TEXT,
                    'answersNumber' => 1,
                    'answers' => ['"foo-bar"']
                ]
            ],
            $collection->toArray()
        );
    }

    public function test_can_clear_results(): void
    {
        $surveyAnswers = SurveyAnswer::factory()->count(3)->hasInputs(3)->create();
        $survey = Survey::factory()->create();

        $surveyAnswer = \Mockery::mock(SurveyAnswer::class);
        $surveyAnswer->shouldReceive('where')->with('survey_id', $survey->id)->once()->andReturnSelf();
        $surveyAnswer->shouldReceive('get')->andReturn($surveyAnswers);
        $surveyAnswerRepository = \Mockery::mock(SurveyAnswerRepository::class);

        (new SurveyResultsService($surveyAnswer, $surveyAnswerRepository))->clearSurveyResults($survey);

        $surveyAnswers->each(fn(SurveyAnswer $answer) => $this->assertSoftDeleted($answer));
    }
}
