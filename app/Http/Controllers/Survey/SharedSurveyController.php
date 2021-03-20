<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SharedSurveyController extends Controller
{
    public function load($code)
    {
        return view('survey.survey');
    }

    public function submit($code)
    {

    }
}
