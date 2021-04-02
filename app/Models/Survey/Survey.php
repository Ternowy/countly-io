<?php

namespace App\Models\Survey;

use App\Casts\SurveyStructureCast;
use App\Models\SurveyAnswer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class, 'survey_id');
    }
}
