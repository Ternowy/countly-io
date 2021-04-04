<?php

namespace App\Models\Survey;

use App\Casts\SurveyStructureCast;
use App\Models\SurveyAnswer;
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

    public function getAccessLinkAttribute(): string
    {
        return $this->getAttribute('access_code');
    }
}
