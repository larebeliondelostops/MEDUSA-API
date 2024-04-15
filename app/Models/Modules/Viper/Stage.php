<?php
namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stages';
    protected $primaryKey = 'id';

    /**
     * Los atributos que son ocultado en masa.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    protected $fillable = [
        'name',
    ];
    protected $dates = ['deteled_at'];

    public function files()
    {
        return $this->hasMany(Folder::class, 'stage_id');
    }
}