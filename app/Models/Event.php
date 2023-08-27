<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    use HasFactory;

    protected $table= 'events';

    protected $fillable = [
        'idEventType',
        'name',
        'startDate',
        'endDate',
        'capacity',
        'place',
        'authorizingEntity',
    ];


    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'idEventType');
    }

    public function eventCoordinate()
    {
        return $this->hasOne(EventCoordinate::class, 'eventId');
    }
}
