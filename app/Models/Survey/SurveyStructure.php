<?php

declare(strict_types=1);

namespace App\Models\Survey;

use Illuminate\Contracts\Support\Arrayable;

class SurveyStructure implements Arrayable
{
    /* @var $inputs SurveyStructureInput[] */
    protected array $inputs;

    public function __construct(array $inputs)
    {
        $this->inputs = $this->wrapInputs($inputs);;
    }

    public function __toString(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        return array_map(function (SurveyStructureInput $input) {
            return $input->toArray();
        }, $this->inputs);
    }

    public function setInputsFromArray(array $inputs): self
    {
        $this->inputs = $this->wrapInputs($inputs);

        return $this;
    }

    /**
     * @param SurveyStructureInput[] $inputs
     * @return $this
     */
    public function setInputs(array $inputs): self
    {
        $this->inputs = $inputs;

        return $this;
    }

    /**
     * @param  mixed  ...$types
     * @return SurveyStructureInput[]
     */
    public function getInputs(mixed ...$types): array
    {
        if (empty($params)) {
            return $this->inputs;
        }

        return array_filter(
            $this->inputs,
            function (SurveyStructureInput $input) use ($types) {
                return in_array($input->getType(), $types);
            }
        );
    }

    /**
     * @param  array  $inputs
     * @return SurveyStructureInput[]
     */
    protected function wrapInputs(array $inputs): array
    {
        return array_map(
            function ($inputData) {
                return new SurveyStructureInput(
                    $inputData['type'],
                    $inputData['label'],
                    $inputData['options'] ?? [],
                    $inputData['placeholder'] ?? '',
                    $inputData['name'] ?? '',
                    $inputData['required'] ?? false
                );
            },
            $inputs
        );
    }
}