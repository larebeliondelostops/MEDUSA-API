<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingPlace extends Model
{
    protected $table = 'pollingPlace';
    
    use HasFactory;

    protected $guarded = [];
}
