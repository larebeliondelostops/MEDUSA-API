<?php

namespace App\Models\Villavicencio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProbabilisticGrid extends Model
{
    use HasFactory;

    protected $table = 'probabilistic_grid';

    public function CriminalActs()
    {
        return $this->hasOne(CriminalActs::class, 'probabilistic_grid_id');
    }
}
