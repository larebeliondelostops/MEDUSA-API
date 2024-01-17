<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class State extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'states';
    protected $fillable = [
        'name',
    ];
    protected $dates = ['deteled_at'];

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function substates()
    {
        return $this->hasMany(Substate::class);
    }
}
