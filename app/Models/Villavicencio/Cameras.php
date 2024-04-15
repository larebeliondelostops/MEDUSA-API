<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cameras extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'cameras';

    private $slug = 'camera';

    private $specialType = 1;

    protected $guarded = [];
    private function pointPropertiesToShow()
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'url' => $this->url
        ];
    }
    private function pointProperties()
    {
        return [
            'specialType' => $this->specialType,
            'url' => $this->url
        ];
    }
}
