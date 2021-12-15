<?php

namespace App\Models\Survey;

use App\Casts\SurveyStructureCast;
use App\Models\SurveyAnswer\SurveyAnswer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'structure',
        'access_code',
        'status',
        'created_by'
    ];

    protected $casts = [
        'structure' => SurveyStructureCast::class
    ];

    protected $appends = [
        'accessLink'
    ];

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class, 'survey_id');
    }

    /**
     * used in the frontend to display access link
     */
    public function getAccessLinkAttribute(): string
    {
        return route('load-survey', ['code' => $this->getAttribute('access_code')]);
    }
}
