<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "municipalities";
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        "name",
        "coordinate_id",
        "department_id",
    ];

    protected static function boot()
    {
        parent::boot();

                /**
         * Cuando se elimine un departamento es importante eliminar su coordenada.
         */
        //borrado de coordenada
        static::deleting(
            function (Municipality $municipality)
            {
                if ($municipality->coordinate)
                {
                    $municipality->coordinate->delete();
                }
            }
        );
    }

    public function department()
    {
        return $this->belongsTo(Department::class,"department_id");
    }

    public function coordinate()
    {
        return $this->belongsTo(Coordinates::class, 'coordinate_id');
    }

    public function projectMunicipality()
    {
        return $this->hasMany(ProjectMunicipality::class, 'municipality_id', 'id');
    }  
}
