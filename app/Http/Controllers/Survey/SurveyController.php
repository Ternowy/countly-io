<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\CreateSurveyRequest;
use App\Http\Requests\Survey\EditSurveyRequest;
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

    public function create(CreateSurveyRequest $request)
    {

    }

    public function edit(EditSurveyRequest $request, $id)
    {

    }

    public function delete($id)
    {

    }

    public function clear($id)
    {

    }

}
