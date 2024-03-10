<?php
namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'projects';
    protected $primaryKey = 'bpin';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'bpin',
        'name',
        'ocad',
        'state_id',
        'substate_id',
        'total_value',
        'requested_value',
        'executed_value',
        'physical_progress',
        'financial_progress',
        'responsible_entity',
        'sector_id',
        'coordinates_id',
        'department_id',
        'municipality_id',
        'beneficiaries',
        'planner',
        'execution_approval_date',
        'completion_date',
        'start_date_execution_phase',
        'unilateral_termination',
        'bilateral_termination',
        'project_duration_in_months',
        'reporting_frequency',
        'general_objective',
    ];

    /**
     * Cuando se elimine un proyecto es importante eliminar sus locaciones.
     * Es importante tener en cuenta que solo se debe borrar sus locaciones
     * es un dato propio del proyecto pero, datos como departamento o
     * municipio no es propio de proyecto, sino es mas general.
     */
    //borrado de coordenada
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            // las locaciones asociadas al proyecto
            if ($project->locations) {
                foreach($project->locations as $location)
                    $location->delete();
            }
        });
    }

    public function department()
    {
        return $this->belongsTo(Department::class, "department_id");
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, "municipality_id");
    }

    public function state()
    {
        return $this->belongsTo(State::class,"state_id");
    }

    public function substate()
    {
        return $this->belongsTo(Substate::class,"substate_id");
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class,"sector_id");
    }

    public function folders()
    {
        return $this->hasMany(Folder::class, 'project_id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class, 'project_bpin');
    }
    public function scope()
    {
        return $this->hasOne(Scope::class, 'project_id');
    }
}
