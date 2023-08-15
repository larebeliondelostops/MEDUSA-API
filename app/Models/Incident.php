<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $table = 'incident';

    protected $guarded = [];

    public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'IndicatorId');
    }
}
