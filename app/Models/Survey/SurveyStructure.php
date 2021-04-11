<?php

declare(strict_types=1);

namespace App\Models\Survey;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class SurveyStructure implements Arrayable
{
    /* @var $inputs SurveyStructureInput[] */
    protected array $inputs;

    public function __construct(array $inputs)
    {
        $this->inputs = $this->wrapInputs($inputs);
    }

    public function __toString(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        return array_map(
            function (SurveyStructureInput $input) {
                return $input->toArray();
            },
            array_values($this->inputs)
        );
    }

    public function getInputs(mixed ...$types): Collection
    {
        $inputs = collect(array_values($this->inputs));

        if (empty($params)) {
            return $inputs;
        }

        return $inputs->filter(
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
        $map = [];

        foreach ($inputs as $input) {
            $map[$input['name']] = new SurveyStructureInput(
                $input['type'],
                $input['label'],
                $input['options'] ?? [],
                $input['placeholder'] ?? '',
                $input['name'],
                $input['required'] ?? false
            );
        }

        return $map;
    }
}