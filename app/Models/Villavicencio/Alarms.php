<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class Alarms extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'alarms';

    protected $guarded = [];

    private $slug = 'alarm';

    protected $keyType = 'string';

    public $incrementing = true; // Indica que el campo 'id' es autoincremental

    protected $attributes = ['uuid', 'name', 'address'];

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
