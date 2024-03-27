<?php

namespace App\Models\Villavicencio;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCoordinate extends Model
{

    use HasFactory;

    protected $table= 'coordinates_events';

    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'latitude',
        'longitude',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}