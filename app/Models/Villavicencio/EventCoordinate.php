<?php

namespace App\Models\Villavicencio;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCoordinate extends Model
{

    use HasFactory;

    protected $table= 'coordinatesEvents';

    public $timestamps = false;

    protected $fillable = [
        'eventId',
        'pointCoordinates',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'eventId');
    }

}