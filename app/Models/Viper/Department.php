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
        'location_id',
    ] ;

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
