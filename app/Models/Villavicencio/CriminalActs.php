<?php

namespace App\Models\Villavicencio;

use App\Models\Indicator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalActs extends Model
{
    use HasFactory;

    protected $table = 'CriminalActs';

    public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'IndicatorId');
    }

    public function ProbabilisticGrid()
    {
        return $this->belongsTo(ProbabilisticGrid::class, 'ProbabilisticGridId');
    }
}
