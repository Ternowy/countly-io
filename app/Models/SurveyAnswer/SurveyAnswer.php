<?php

declare(strict_types=1);

namespace App\Models\SurveyAnswer;

use App\Models\Survey\Survey;
use App\Models\SurveyAnswerQuality;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
class SurveyAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'survey_id',
        'ip_address',
    ];

    protected $hidden = [
        'ip_address',
    ];

    public function survey()
    {
        return $this->hasOne(Survey::class, 'id', 'survey_id');
    }

    public function inputs()
    {
        return $this->hasMany(SurveyAnswerInput::class, 'answer_id');
    }

    public function quality()
    {
        return $this->hasOne(SurveyAnswerQuality::class, 'survey_answer_id');
    }
}
