<?php

namespace App\Models\Villavicencio;

use Carbon\Carbon;
use App\Models\Indicator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Schema;

class Incident extends Model
{
    use HasFactory;

    protected $table = 'incident';

    protected $guarded = [];

    public function Indicator(): BelongsTo
    {
        return $this->belongsTo(Indicator::class, $this->getIndicatorColumn());
    }

    public function getDate()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

    public function getIndicatorIdAttribute()
    {
        return $this->attributes['indicator_id']
            ?? $this->attributes['indicator']
            ?? null;
    }

    public function setIndicatorIdAttribute($value): void
    {
        $column = $this->getIndicatorColumn();
        $this->attributes[$column] = $value;
    }

    public function getPositionAttribute(): ?string
    {
        if ($this->latitude === null || $this->longitude === null) {
            return null;
        }

        return $this->longitude . ', ' . $this->latitude;
    }

    public function getIndicatorColumn(): string
    {
        return Schema::hasColumn($this->getTable(), 'indicator_id') ? 'indicator_id' : 'indicator';
    }
}
