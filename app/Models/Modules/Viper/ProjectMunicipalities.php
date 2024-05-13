<?php

namespace App\Models\Modules\Viper;

use App\Models\Modules\Viper\Municipality;
use App\Models\Modules\Viper\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectMunicipalities extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'project_municipalities';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'project_bpin',
        'municipality_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_bpin', 'bpin');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id', 'id');
    }
}
