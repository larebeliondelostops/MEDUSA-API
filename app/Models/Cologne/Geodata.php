<?php

namespace App\Models\Cologne;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geodata extends Model
{
    use HasFactory;

    protected $table = 'cologne_geodata';

    protected $guarded = [];

    protected $casts = [
        'geometry' => 'array',
        'properties' => 'array',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    private string $dataset = '';

    public function forDataset(string $dataset): self
    {
        $this->dataset = $dataset;

        return $this;
    }

    public function dataset(): string
    {
        return $this->dataset;
    }

    public function getCacheKeyMarker(): string
    {
        return "cologne_{$this->dataset}_marker";
    }
}
