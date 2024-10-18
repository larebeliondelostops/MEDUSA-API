<?php

namespace App\Models\Villavicencio;

use App\Models\Indicator;
use App\Traits\Heatmaps\HasHeatmap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CriminalActs extends Model
{
    use HasFactory, HasHeatmap;

    protected $table = 'criminal_acts';

    protected $guarded = [];

    public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id');
    }

    public function ProbabilisticGrid()
    {
        return $this->belongsTo(ProbabilisticGrid::class, 'probabilistic_grid_id');
    }
}
