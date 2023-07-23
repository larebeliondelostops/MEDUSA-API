<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProbabilisticGrid extends Model
{
    use HasFactory;

    protected $table = 'ProbabilisticGrid';

    public function CriminalActs()
    {
        return $this->hasOne(CriminalActs::class, 'ProbabilisticGridId');
    }
}
