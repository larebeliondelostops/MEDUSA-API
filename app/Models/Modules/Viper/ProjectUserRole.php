<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Model;

class ProjectUserRole extends Model
{
    protected $table = 'project_user_role';

    protected $fillable = [
        'project_id',
        'user_id',
        'rol_id',
    ];

    // Relación con el modelo Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con el modelo Role (si es necesario)
    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }
}
