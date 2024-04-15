<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvlHistoryCoordinates extends Model
{
    use HasFactory;

    protected $primaryKey = 'imei';

    public $timestamps = false;

    protected $table = 'avl_history_coordinates';
}
