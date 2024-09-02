<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progresses';

    protected $primaryKey = 'id';

    protected $hidden = [
        'updated_at', 
        'created_at'
    ];

    protected $fillable = [
        'week',
        'activity_completed',
        'activity_id',
        'observations',
        'summary',
        'conclusions',
        'recommendations',
        'progress_of_term',
        'actual_physical_progress',
        'financial_progress_on_site',
        'billed_financial_progress'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
