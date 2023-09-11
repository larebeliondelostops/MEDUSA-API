<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMarker extends Model
{
    use HasFactory;

    protected $table = 'type_marker';

    protected $guarded = [];

    /* public function bar_menu()
    {
        return $this->hasMany(BarMenu::class);
    } */
}
