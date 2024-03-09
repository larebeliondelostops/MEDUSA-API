<?php

namespace App\Models;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'health';

    private $slug = 'entity';

    protected $guarded = [];

}
