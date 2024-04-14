<?php

namespace App\Models;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooleanSelect extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'boolean_select';

    private $slug = 'booleanSelect';

    protected $guarded = [];

    private function pointProperties()
    {
        return [];
    }
}
