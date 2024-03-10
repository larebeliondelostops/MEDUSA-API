<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordinates extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'coordinates';
    protected $dates = ['deleted_at'];
    protected $keyType = 'string';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'id',
        'type',
        'latitude',
        'longitude'
    ];

    public function location()
    {
        return $this->hasOne(Location::class, 'coordinate_id');
    }
}
