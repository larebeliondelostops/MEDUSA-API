<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Category extends Indicator
{
    protected static function booted(): void
    {
        static::addGlobalScope('incident_categories', function (Builder $builder) {
            $builder->whereNull('parent_indicator_id')->whereBetween('id', [1, 10]);
        });
    }
}
