<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertSeverity extends Model
{
    use HasFactory;
    
    protected $table = 'alert_severities';

    protected $fillable = [
        'name'
    ];
}
