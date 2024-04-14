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

    private function pointPropertiesToShow()
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'potential_women' => $this->potential_women,
            'potential_men' => $this->potential_men,
            'total_votes' => $this->total_votes,
            'tables' => $this->tables,
        ];
    }
    private function pointProperties()
    {
        return [];
    }
}
