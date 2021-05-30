<?php

declare(strict_types=1);

namespace App\Service\Survey\Results;

use App\Models\Survey\Survey;
use App\Models\Survey\SurveyStructureInput;
use App\Models\SurveyAnswer\SurveyAnswer;
use App\Models\SurveyAnswer\SurveyAnswerInput;
use App\Repository\Survey\SurveyAnswerRepository;
use Illuminate\Support\Collection;

class SurveyResultsService
{
    protected SurveyAnswer $surveyAnswer;

    protected SurveyAnswerRepository $surveyAnswerRepository;

    public function __construct(
        SurveyAnswer $surveyAnswer,
        SurveyAnswerRepository $surveyAnswerRepository,
    ) {
        $this->surveyAnswer = $surveyAnswer;
        $this->surveyAnswerRepository = $surveyAnswerRepository;
    }

    public function getResultsCollection(Survey $survey): Collection
    {
        $preparedAnswers = [];

        $survey->structure->getInputs()->each(
            function (SurveyStructureInput $surveyStructureInput) use ($survey, &$preparedAnswers) {
                $statistics = [];

                $allInputs = $this->surveyAnswerRepository->getSurveyQuestionInputs(
                    $survey,
                    $surveyStructureInput->getName()
                );

                if ($surveyStructureInput->isTextInput()) {
                    $allInputs->each(
                        function (SurveyAnswerInput $surveyAnswerInput) use (&$statistics) {
                            $value = $surveyAnswerInput->value;
                            if (is_string($value)) {
                                $statistics[] = $value;
                            }
                        }
                    );
                } elseif ($surveyStructureInput->isInputWithOptions()) {
                    foreach ($surveyStructureInput->getOptions() as $option) {
                        $statistics[$option] = 0;
                    }

                    if ($surveyStructureInput->canHaveMultipleAnswers()) {
                        $allInputs->each(
                            function (SurveyAnswerInput $surveyAnswerInput) use (&$statistics) {
                                $value = $surveyAnswerInput->value;
                                if (is_array($value)) {
                                    foreach ($value as $answer) {
                                        if (in_array($answer, array_keys($statistics))) {
                                            $statistics[$answer] = $statistics[$answer] + 1;
                                        }
                                    }
                                }
                            }
                        );
                    } else {
                        $allInputs->each(
                            function (SurveyAnswerInput $surveyAnswerInput) use (&$statistics) {
                                $value = $surveyAnswerInput->value;
                                if (in_array($value, array_keys($statistics))) {
                                    $statistics[$value] = $statistics[$value] + 1;
                                }
                            }
                        );
                    }
                }

                $preparedAnswers[$surveyStructureInput->getName()] = [
                    'label' => $surveyStructureInput->getLabel(),
                    'type' => $surveyStructureInput->getType(),
                    'answers_number' => $allInputs->count(),
                    'answers' => $statistics
                ];
            }
        );


        return collect($preparedAnswers);
    }

    /**
     * Delete all survey submissions
     */
    public function clearSurveyResults(Survey $survey): void
    {
        $surveyAnswers = $this->surveyAnswer->where('survey_id', $survey->id)->get();

        $surveyAnswers->each(
            function (SurveyAnswer $surveyAnswer) {
                $surveyAnswer->inputs()->delete();
                $surveyAnswer->delete();
            }
        );

        //TODO create cleanup job queue to delete instantly
    }
}