<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiberPoint extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'fiber_points';

    private $slug = 'fiber';

    protected $guarded = [];

    private function pointProperties()
    {
        return [];
    }
}
