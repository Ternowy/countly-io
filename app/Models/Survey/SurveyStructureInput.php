<?php

declare(strict_types=1);

namespace App\Models\Survey;

use App\Enum\Survey\SurveyInputTypeEnum;
use App\Helper\Survey\SurveyEnumHelper;
use Illuminate\Contracts\Support\Arrayable;

class SurveyStructureInput implements Arrayable
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

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getName(): string
    {
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

    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'label' => $this->label,
            'name' => $this->name,
            'required' => $this->required,
            'placeholder' => $this->placeholder,
            'options' => $this->options
        ];
    }

    public function isTextInput(): bool
    {
        return in_array($this->getType(), SurveyEnumHelper::inputsWithText());
    }

    public function isInputWithOptions(): bool
    {
        return in_array($this->getType(), SurveyEnumHelper::inputsWithOptions());
    }

    public function canHaveMultipleAnswers(): bool
    {
        return $this->getType() === SurveyInputTypeEnum::CHECKBOX;
    }
}
