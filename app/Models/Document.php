<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $primaryKey = 'document_id';

    protected $fillable = [
        'name',
        'content',
        'responsible',
        'file_id',
    ];

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
}