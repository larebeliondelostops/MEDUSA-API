<?php
namespace App\Models;

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
        'state',
        'substate',
        'total_value',
        'requested_value',
        'executed_value',
        'physical_progress',
        'financial_advance',
        'beneficiaries',
    ];

    public function files()
    {
        return $this->hasMany(File::class, 'project_id');
    }
}
