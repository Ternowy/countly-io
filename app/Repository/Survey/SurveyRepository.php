<?php

declare(strict_types=1);

namespace App\Repository\Survey;

use App\Enum\Survey\SurveyStatusEnum;
use App\Models\Survey\Survey;
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
        return $this->survey
            ->where('created_by', $user->id)
            ->withCount('answers')
            ->get();
    }

    public function getById(Authenticatable $user, int $id, bool $strict = false): Survey
    {
        $query = $this->survey->where(
            [
                'id' => $id,
                'created_by' => $user->id
            ]
        )->withCount('answers');

        if ($strict) {
            return $query->firstOrFail();
        }

        return $query->first();
    }

    public function getByCode(string $code, array $columns = ['*']): Survey
    {
        return $this->survey
            ->where(
                [
                    'access_code' => $code,
                    'status' => SurveyStatusEnum::ACTIVE
                ]
            )
            ->first($columns);
    }
}