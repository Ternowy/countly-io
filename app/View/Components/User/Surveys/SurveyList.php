<?php

namespace App\View\Components\User\Surveys;

use Illuminate\View\Component;

class SurveyList extends Component
{
    public array $surveyList;

    public function __construct(array $surveyList)
    {
        $this->surveyList = $surveyList;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.surveys.survey-list');
    }
}
