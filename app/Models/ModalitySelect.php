<?php

namespace App\Models;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalitySelect extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'modality_select';

    private $slug = 'modality_select';

    protected $guarded = [];

    private function pointProperties()
    {
        return [];
    }
}
