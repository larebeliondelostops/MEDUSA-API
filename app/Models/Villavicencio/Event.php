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
        'event_type_id',
        'name',
        'start_date',
        'end_date',
        'capacity',
        'place',
        'authorizing_entity',
    ];

    private $slug = 'event';


    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    public function eventCoordinate()
    {
        return $this->hasOne(EventCoordinate::class, 'event_id');
    }

    public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->uuid = Uuid::uuid4()->toString();
		});
	}

    private function pointProperties()
    {
        return [];
    }
}
