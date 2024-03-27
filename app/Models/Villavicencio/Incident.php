<?php

namespace App\Models\Villavicencio;

use Carbon\Carbon;
use App\Models\Indicator;
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
