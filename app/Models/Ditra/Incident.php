<?php

namespace App\Models\Ditra;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'incident';

    protected $guarded = [];

    public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator');
    }

    private function pointProperties()
    {
        return [];
    }
}
