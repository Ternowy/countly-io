<?php

namespace App\Http\Controllers\SurveyResults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyResultsController extends Controller
{
    public function results()
    {
        return view('user.survey.results');
    }

    public function media()
    {

    }
}
