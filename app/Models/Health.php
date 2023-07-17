<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'health';
    
    public function entities()
    {
        return $this->belongsTo(Entities::class, 'idEntities');
    }

}
