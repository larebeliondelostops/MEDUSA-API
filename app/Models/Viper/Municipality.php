<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $table = "municipalities";

    protected $fillable = [
        "name",
        "type_location",
        "latitude",
        "longitude",
        "department_id",
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,"department_id");
    }
}
