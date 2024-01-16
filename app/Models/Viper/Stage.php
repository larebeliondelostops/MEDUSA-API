<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $table = 'stages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function files()
    {
        return $this->hasMany(Folder::class, 'stage_id');
    }
}