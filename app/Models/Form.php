<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms';

    protected $guarded = [];

    public function Fields()
    {
        return $this->belongsTo(Field::class, 'field');
    }

    public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$max = self::max('id'); // obtiene el valor máximo de la columna id
			$model->id = $max + 1; // asigna el valor siguiente al atributo id
		});
	}
}
