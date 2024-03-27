<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cai extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'cai';

    private $slug = 'cai';

    protected $guarded = [];

    private function pointProperties()
    {
        return [];
    }
}
