<?php

namespace App\Models\Villavicencio;

use App\Models\Indicator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalActs extends Model
{
    use HasFactory;

    protected $table = 'criminal_acts';

    public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id');
    }

    public function ProbabilisticGrid()
    {
        return $this->belongsTo(ProbabilisticGrid::class, 'probabilistic_grid_id');
    }
}
