<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthCenter extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'health_centers';

    private function pointProperties()
    {
        return [];
    }
}
