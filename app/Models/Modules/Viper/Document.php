<?php
namespace App\Models\Modules\Viper;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'documents';
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
        'url',
        'responsible',
        'folder_id',
    ];

    protected $dates = ['deleted_at']; 

    public function folder()
    {
        return $this->belongsTo(Folder::class, "folder_id");
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, "responsible");
    }
}
