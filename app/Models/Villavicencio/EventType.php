<?php

namespace App\Models\Villavicencio;

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
