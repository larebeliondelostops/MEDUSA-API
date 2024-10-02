<?php

namespace App\Models\Modules\Viper;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * Clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son ocultado en masa.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'user_id', 
        'progress_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function progress()
    {
        return $this->belongsTo(Progress::class, 'progress_id');
    }
}
