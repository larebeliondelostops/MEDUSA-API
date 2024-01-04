<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'stage_id',
        'project_id',
    ];

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'folder_id');
    }

    public function higherFolders()
    {
        return $this->belongsToMany(Folder::class, 'folder_relationships', 'lower_folder', 'higher_folder');
    }

    public function lowerFolders()
    {
        return $this->belongsToMany(Folder::class, 'folder_relationships', 'higher_folder', 'lower_folder');
    }
}