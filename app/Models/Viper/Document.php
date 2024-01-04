<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $primaryKey = 'document_id';

    protected $fillable = [
        'name',
        'url',
        'responsible',
        'folder_id',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }
}