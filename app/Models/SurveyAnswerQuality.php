<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswerQuality extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_answer_id',
        'quality_rating',
        'input_time',
    ];
}
