<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "municipalities";
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        "name",
        "location_id",
        "department_id",
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,"department_id");
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
