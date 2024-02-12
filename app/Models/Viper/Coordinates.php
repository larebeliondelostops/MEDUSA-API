<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordinates extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'coordinates';
    protected $dates = ['deleted_at'];
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'type',
        'latitude',
        'longitude'
    ];

    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
