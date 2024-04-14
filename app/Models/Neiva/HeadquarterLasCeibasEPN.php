<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeadquarterLasCeibasEPN extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'headquarters_las_ceibas_e_p_n';

    private function pointProperties()
    {
        return [];
    }
}
