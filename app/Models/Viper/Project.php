<?php
namespace App\Models\Viper;

use App\Models\Department;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'bpin';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'bpin',
        'name',
        'ocad',
        'state',
        'substate',
        'total_value',
        'requested_value',
        'executed_value',
        'physical_progress',
        'financial_progress',
        'responsible_entity',
        'sector',
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

    public function folders()
    {
        return $this->hasMany(Folder::class, 'project_id');
    }
}
