<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function surveys()
    {
        return view('user.surveys');
    }

    public function builder()
    {
        return view('user.survey.builder');
    }
}
