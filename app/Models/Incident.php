<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getDate()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }
}
