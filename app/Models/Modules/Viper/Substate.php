<?php
namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Substate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'substates';
    protected $primaryKey = 'id';
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'name',
        'state_id',
    ];

    protected $dates = ['deteled_at'];

    public function state()
    {
        return $this->belongsTo(State::class,"state_id");
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
