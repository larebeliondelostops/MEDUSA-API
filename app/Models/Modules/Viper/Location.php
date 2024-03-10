<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'name',
        'project_bpin',
        'coordinate_id',
        'department_id',
        'municipality_id'
    ];

    protected static function boot()
    {
        parent::boot();

        /**
         * Cuando se elimine una locacion es importante eliminar su coordenada.
         * Es importante tener en cuenta que solo se borra su coordenada que
         * es un dato propio de la locacion pero, datos como departamento o
         * municipio no es propio de locacion por eso no se debe eliminar como
         * coordenada.
         */
        //borrado de coordenada
        static::deleting(
            function (Location $location)
            {
                // eliminamos la coordenada
                if ($location->coordinate)
                    $location->coordinate->delete();
            }
        );
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_bpin');
    }

    public function coordinate()
    {
        return $this->belongsTo(Coordinates::class, 'coordinate_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }
}
