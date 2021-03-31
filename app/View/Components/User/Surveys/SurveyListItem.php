<?php

namespace App\View\Components\User\Surveys;

use Illuminate\View\Component;

class SurveyListItem extends Component
{
    public array $survey;

    public function __construct(array $survey)
    {
        $this->survey = $survey;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.surveys.survey-list-item');
    }

    public function getAccessLink(): string
    {
        return $this->survey['access_code'];
    }
}
