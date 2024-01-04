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

    protected $fillable = [
        'bpin',
        'name',
        'ocad',
        'type',
        'state',
        'substate',
        'total_value',
        'requested_value',
        'executed_value',
        'physical_progress',
        'responsible_entity',
        'sector',
        'location',
        'beneficiaries',
        'planner',
        'execution_approval_date',
        'completion_date',
        'reporting_frequency',
        'general_objective',
        'responsible',
    ];

    public function folders()
    {
        return $this->hasMany(Folder::class, 'project_id');
    }
}