<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'documents';
    protected $primaryKey = 'id';

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
}
