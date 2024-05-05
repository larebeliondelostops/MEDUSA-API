<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cais extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'cai';

    private $slug = 'cai';

    private $cacheKeyMarker = 'cais_marker';

    protected $guarded = [];

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

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
