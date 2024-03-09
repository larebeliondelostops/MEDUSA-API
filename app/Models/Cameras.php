<?php

namespace App\Models;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cameras extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'cameras';

    private $slug = 'camera';

    protected $guarded = [];
}
