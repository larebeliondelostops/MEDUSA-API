<?php
namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'folders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'stage_id',
        'project_id',
        'higher_folder_id', 
    ];

    protected $dates = ['deleted_at'];

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

    public function parentFolder()
    {
        return $this->belongsTo(Folder::class, 'higher_folder_id');
    }

    public function subfolders()
    {
        return $this->hasMany(Folder::class, 'higher_folder_id');
    }
}

