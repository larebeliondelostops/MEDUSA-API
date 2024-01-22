<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];
    protected $dates = ['deteled_at'];

    public function files()
    {
        return $this->hasMany(Folder::class, 'stage_id');
    }
}