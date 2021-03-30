<?php

declare(strict_types=1);

namespace App\Models\Survey;

use App\Helper\Survey\SurveyEnumHelper;
use BadFunctionCallException;

class SurveyStructureInput
{
    public function __construct(
        protected string $type,
        protected string $label,
        protected array $options = [],
        protected string $placeholder = '',
        protected string $name = '',
        protected bool $required = false,
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    public function getName(): string
    {
        if (empty($name)) {
            throw new BadFunctionCallException('name is not set');
        }

        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function toArray(): array
    {
        $inputData = [
            'type' => $this->type,
            'label' => $this->label,
            'name' => $this->name,
            'required' => $this->required
        ];

        if (in_array($this->type, SurveyEnumHelper::inputsWithText())) {
            $inputData['placeholder'] = $this->placeholder;
        } elseif (in_array($this->type, SurveyEnumHelper::inputsWithOptions())) {
            $inputData['options'] = $this->options;
        }

        return $inputData;
    }
}