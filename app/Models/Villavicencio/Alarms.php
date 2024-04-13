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

    private function pointPropertiesToShow()
    {
        return [
            'name' => $this->name,
            'address' => $this->address
        ];
    }

    private function pointProperties()
    {
        return [];
    }
}
