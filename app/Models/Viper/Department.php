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
        "type_location",
        "latitude",
        "longitude",
    ] ;

    function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
