<?php

namespace App\Models\Villavicencio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProbabilisticGridIpat extends Model
{
    use HasFactory;

    protected $table = 'probabilistic_grid_ipats';

    public function Ipats()
    {
        return $this->hasOne(Ipats::class, 'probabilistic_grid_id');
    }
}
