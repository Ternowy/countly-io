<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
class UserData extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'surveys_limit',
        'records_limit'
    ];
}
