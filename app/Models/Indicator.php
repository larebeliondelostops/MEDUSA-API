<?php

namespace App\Models;

use App\Models\Villavicencio\CriminalActs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    protected $table = 'indicators';

    public function CriminalActs()
    {
        return $this->hasOne(CriminalActs::class, 'indicator_id');
    }
}
