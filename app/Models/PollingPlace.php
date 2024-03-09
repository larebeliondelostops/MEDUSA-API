<?php

namespace App\Models;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingPlace extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'pollingPlace';

    private $slug = 'pollingPlace';

    protected $guarded = [];
}
