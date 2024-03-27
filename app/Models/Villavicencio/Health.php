<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'health';

    private $slug = 'entity';

    protected $guarded = [];

    private function pointProperties()
    {
        return [];
    }
}
