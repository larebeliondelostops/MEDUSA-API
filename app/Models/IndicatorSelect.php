<?php

namespace App\Models;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicatorSelect extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'indicator_select';

    private $slug = 'indicator_select';

    protected $guarded = [];

    private function pointProperties()
    {
        return [];
    }
}
