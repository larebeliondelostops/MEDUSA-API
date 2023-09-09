<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarMenu extends Model
{
    use HasFactory;

    protected $table = 'bar_menu';

    protected $guarded = [];

    public function typeMarker()
    {
        return $this->belongsTo(TypeMarker::class, 'type_marker', 'id');
    }
}
