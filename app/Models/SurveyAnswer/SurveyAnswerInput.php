<?php

namespace App\Models\SurveyAnswer;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class SurveyAnswerInput extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'answer_id',
        'input_name',
        'value'
    ];

    protected $casts = [
        'value' => 'array'
    ];
}
