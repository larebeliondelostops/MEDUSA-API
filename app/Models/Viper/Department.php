<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "departments";
    protected $dates = ["deleted_at"];
    protected $fillable = [
        "name",
        'coordinates_id',
    ] ;

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    public function coordinates()
    {
        return $this->belongsTo(Coordinates::class, 'coordinates_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
