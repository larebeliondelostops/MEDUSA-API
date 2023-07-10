<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordenadaEvento extends Model
{

    use HasFactory;

    protected $table= 'coordenadas_eventos';

    public $timestamps = false;

    protected $fillable = [
        'id_evento',
        'coordenada_punto',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }

}