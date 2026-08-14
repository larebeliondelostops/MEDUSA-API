<?php

namespace App\Models;

use App\Models\Villavicencio\CriminalActs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Indicator extends Model
{
    use HasFactory;

    protected $table = 'indicators';

    protected $fillable = [
        'name',
        'description',
        'parent_indicator_id',
    ];

    public function CriminalActs()
    {
        return $this->hasOne(CriminalActs::class, 'indicator_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_indicator_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_indicator_id')->orderBy('id');
    }
}
