<?php

namespace App\Models;

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
        'answer'
    ];

    protected $casts = [
        'answer' => 'array'
    ];
}
