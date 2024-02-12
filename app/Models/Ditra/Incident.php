<?php

namespace App\Models\Ditra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $table = 'incident';

    protected $guarded = [];

    public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator');
    }
}
