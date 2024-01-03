<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name_file_id',
        'stage_id',
        'higher_file_id',
        'project_id',
    ];

    public function document()
    {
        return $this->hasOne(Document::class, 'file_id');
    }

    public function nameFile()
    {
        return $this->belongsTo(NameFile::class, 'name_file_id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function higherFile()
    {
        return $this->belongsTo(File::class, 'higher_file_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'bpin');
    }
}