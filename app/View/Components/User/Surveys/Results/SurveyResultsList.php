<?php

namespace App\View\Components\User\Surveys\Results;

use Illuminate\View\Component;

class SurveyResultsList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.surveys.results.survey-results-list');
    }
}
