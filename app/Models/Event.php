<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Event extends Model
{

    use HasFactory;

    protected $table= 'events';

    protected $fillable = [
        'id_event_type',
        'name',
        'startDate',
        'endDate',
        'capacity',
        'place',
        'authorizingEntity',
    ];


    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'id_event_type');
    }

    public function eventCoordinate()
    {
        return $this->hasOne(EventCoordinate::class, 'eventId');
    }

    public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->uuid = Uuid::uuid4()->toString(); // asigna el valor siguiente al atributo id
		});
	}
}
