<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Model;

class ProjectUserRole extends Model
{
    protected $table = 'project_user_role';

    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    protected $fillable = [
        'project_id',
        'user_id',
        'rol_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(\Spatie\Permission\Models\Role::class, 'rol_id');
    }
}
