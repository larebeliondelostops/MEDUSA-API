<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

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
        'type_location',
        'latitude_location',
        'longitude_location',
        'department_id',
        'municipality_id',
        'location',
        'beneficiaries',
        'planner',
        'execution_approval_date',
        'completion_date',
        'start_date_execution_phase',
        'project_duration_in_months',
        'reporting_frequency',
        'general_objective',
    ];

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
}
