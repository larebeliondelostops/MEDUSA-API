<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
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
