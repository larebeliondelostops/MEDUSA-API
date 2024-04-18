<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublicSafety extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'public_safety';

    private $slug = 'public_safety';

    private function pointProperties()
    {
        return [];
    }
}
