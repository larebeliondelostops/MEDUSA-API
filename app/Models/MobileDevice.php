<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MobileDevice extends Model
{
    protected $table = 'mobile_devices';
    
    use HasFactory;

    protected $guarded = [];

    protected $keyType = 'string';
    public $incrementing = true; // Indica que el campo 'id' es autoincremental
    protected $fillable = ['id_user', 'device_token', 'is_active', 'position', 'is_active_position'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    

}
