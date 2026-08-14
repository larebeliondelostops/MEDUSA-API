<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Subindicator extends Indicator
{
    protected static function booted(): void
    {
        static::addGlobalScope('incident_subindicators', function (Builder $builder) {
            $builder->whereNotNull('parent_indicator_id');
        });
    }
}
