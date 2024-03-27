<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingPlace extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'polling_places';

    private $slug = 'pollingPlace';

    protected $guarded = [];

    private function pointProperties()
    {
        return [];
    }
}
