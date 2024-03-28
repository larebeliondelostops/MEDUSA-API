<?php

namespace App\Models\Modules\Viper;

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
        'coordinate_id',
    ] ;
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        /**
         * Cuando se elimine un departamento es importante eliminar su coordenada.
         */
        //borrado de coordenada
        static::deleting(
            function (Department $department)
            {
                // eliminamos la coordenada
                if ($department->coordinate)
                    $department->coordinate->delete();
            }
        );
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    public function coordinate()
    {
        return $this->belongsTo(Coordinates::class, 'coordinate_id');
    }
}
