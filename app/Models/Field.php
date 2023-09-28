<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $table = 'fields';

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$max = self::max('id'); // obtiene el valor máximo de la columna id
			$model->id = $max + 1; // asigna el valor siguiente al atributo id
		});
	}
}
