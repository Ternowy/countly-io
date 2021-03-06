<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Enum\Survey\SurveyInputTypeEnum;
use App\Models\User;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class SurveyControllerTest extends TestCase
{
    private function getUser(): User
    {
        return User::factory()->create();
    }

    private function processRequest(User $user, array $data = []): TestResponse
    {
        return $this
            ->actingAs($user, 'web')
            ->postJson(
                route('save-survey'),
                $data
            );
    }

    public function test_can_create_survey(): void
    {
        $this
            ->processRequest(
                $this->getUser(),
                [
                    'name' => __('example-survey.survey.name'),
                    'description' => __('example-survey.survey.description'),
                    'structure' => [
                        'inputs' => [
                            [
                                'type' => SurveyInputTypeEnum::SELECT,
                                'label' => __('example-survey.survey.input.select.label'),
                                'options' => [
                                    __('example-survey.survey.input.select.option.a'),
                                    __('example-survey.survey.input.select.option.b'),
                                    __('example-survey.survey.input.select.option.c'),
                                ],
                            ],
                            [
                                'type' => SurveyInputTypeEnum::RADIO,
                                'label' => __('example-survey.survey.input.radio.label'),
                                'options' => [
                                    __('example-survey.survey.input.radio.option.a'),
                                    __('example-survey.survey.input.radio.option.b'),
                                    __('example-survey.survey.input.radio.option.c'),
                                ],
                            ],
                            [
                                'type' => SurveyInputTypeEnum::CHECKBOX,
                                'label' => __('example-survey.survey.input.checkbox.label'),
                                'options' => [
                                    __('example-survey.survey.input.checkbox.option.a'),
                                    __('example-survey.survey.input.checkbox.option.b'),
                                    __('example-survey.survey.input.checkbox.option.c'),
                                ],
                            ],
                            [
                                'type' => SurveyInputTypeEnum::TEXT,
                                'label' => __('example-survey.survey.input.text.label'),
                                'placeholder' => __('example-survey.survey.input.text.placeholder'),
                            ],
                            [
                                'type' => SurveyInputTypeEnum::TEXTAREA,
                                'label' => __('example-survey.survey.input.textarea.label'),
                                'placeholder' => __('example-survey.survey.input.textarea.placeholder'),
                            ]
                        ],
                        'ctaButton' => [
                            'label' => 'Test'
                        ]
                    ],
                ]
            )
            ->assertStatus(201)
            ->assertJsonFragment(
                [
                    'name' => __('example-survey.survey.name'),
                    'description' => __('example-survey.survey.description'),
                    'structure' => []
                ]
            );
    }
}
