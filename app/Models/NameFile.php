<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameFile extends Model
{
    use HasFactory;

    protected $table = 'name_files';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function files()
    {
        return $this->hasMany(File::class, 'name_file_id');
    }
}