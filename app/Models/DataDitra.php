<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDitra extends Model
{
    use HasFactory;

    protected $table = 'data_ditra';

    protected $fillable = [
        'year', 'uuid', 'occurrence_date', 'month', 'day', 'hour', 'hour_range', 'sectional', 'coordinates',
        'assigned', 'identification', 'grade', 'names', 'last_names', 'age', 'age_range', 'gender',
        'marital_status', 'intoxication', 'responsibility', 'plate', 'vehicle_class', 'model', 'cc',
        'service_class', 'insurance', 'inspection', 'license', 'type', 'hypothesis', 'possible_occurrence'
    ];
}