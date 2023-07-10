<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table = 'tipo_eventos';

    public $timestamps = false;

    protected $fillable = [
        'nombre_evento',
        'descripcion_evento',
    ];

    use HasFactory;
}
