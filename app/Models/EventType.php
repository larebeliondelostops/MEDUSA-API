<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = 'eventsType';

    public $timestamps = false;

    protected $fillable = [
        'eventName',
        'eventDescription',
    ];

    use HasFactory;
}
