<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Event extends Model
{

    use HasFactory, HasPoints;

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

    private $slug = 'event';


    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'idEventType');
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

    private function pointProperties()
    {
        return [];
    }
}
