<?php


/**
 * Trait UsesUUID
 * @package App\Http\Traits
 *
 * Resource -> https://dev.to/cverster/uuids-in-laravel-7-4kke
 * @author Puji Rahayu
 */

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UsesUUID
{
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) $model->{$model->getKeyName()} = (string)Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }


}
