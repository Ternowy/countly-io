<?php

declare(strict_types=1);

namespace Service\Survey;

use App\Models\Survey\Survey;
use App\Service\Survey\SurveyDecorator;
use Tests\TestCase;

class SurveyDecoratorTest extends TestCase
{
    public function test_can_decorate(): void
    {
        $survey = Survey::factory()->create();
        $surveyForSharingOnly = Survey::factory()->create();

        $decorator = new SurveyDecorator();

        $decoratedSurveyGeneral = $decorator->decorate($survey);
        $decoratedSurveyForSharingOnly = $decorator->decorate($surveyForSharingOnly, true);

        $this->assertSame(
            route('edit-survey', ['id' => $survey->id]),
            $decoratedSurveyGeneral->editLink,
            'Edit link mismatch'
        );
        $this->assertSame(
            route('submit-survey', ['code' => $surveyForSharingOnly->access_code]),
            $decoratedSurveyForSharingOnly->submitSurveyUri,
            'Submit link mismatch'
        );
        $this->assertEmpty(
            $decoratedSurveyForSharingOnly->editLink,
            'Edit link mismatch'
        );
    }
}