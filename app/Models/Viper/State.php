<?php

namespace App\Models\Viper;

use App\Models\Viper\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';
    protected $fillable = [
        'name',
    ];

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
