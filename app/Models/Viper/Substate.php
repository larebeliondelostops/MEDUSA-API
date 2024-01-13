<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Substate extends Model
{
    use HasFactory;

    protected $table = 'substates';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(State::class,"state_id");
    }
}
