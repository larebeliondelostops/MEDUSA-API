<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SportVenues extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'sports_venues';

    private function pointProperties()
    {
        return [];
    }
}
