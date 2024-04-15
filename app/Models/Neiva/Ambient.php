<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ambient extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'ambient';

    private function pointProperties()
    {
        return [];
    }
}
