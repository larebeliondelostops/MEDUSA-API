<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderRelationship extends Model
{
    use HasFactory;

    protected $table = 'folder_relationships';
    protected $primaryKey = 'id';

    protected $fillable = [
        'higher_folder',
        'lower_folder',
    ];

    public function higherFolder()
    {
        return $this->belongsTo(Folder::class, 'higher_folder');
    }

    public function lowerFolder()
    {
        return $this->belongsTo(Folder::class, 'lower_folder');
    }
}