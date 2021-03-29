<?php

declare(strict_types=1);

namespace App\Repository\Survey;

use App\Models\Survey;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

class SurveyRepository
{
    protected Survey $survey;

    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
    }

    public function allOfUser(Authenticatable $user): Collection
    {
        return $this->survey->where('created_by', $user->id)->get();
    }

    public function getById(Authenticatable $user, int $id): Survey
    {
        return $this->survey->where(
            [
                'id' => $id,
                'created_by' => $user->id
            ]
        )->get();
    }
}