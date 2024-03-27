<?php

namespace App\Models\Villavicencio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = 'events_type';

    public $timestamps = false;

    protected $fillable = [
        'event_name',
        'event_description',
    ];

    use HasFactory;
}
