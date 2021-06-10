<?php

namespace App\Casts;

use App\Models\Survey\Factory\SurveyStructureFactory;
use App\Models\Survey\SurveyStructure;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\App;

class SurveyStructureCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return App::make(SurveyStructureFactory::class)->createInstance(
            json_decode($value, true)
        );
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        /* @var $value SurveyStructure*/
        return json_encode($value->toArray());
    }
}
