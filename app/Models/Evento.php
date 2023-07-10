<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    use HasFactory;

    protected $table= 'eventos';

    protected $fillable = [
        'id_tipo_evento',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
        'direccion',
        'capacidad',
        'estado',
        'lugar',
        'entidad_autorizante',
    ];


    public function tipoEvento()
    {
        return $this->belongsTo(TipoEvento::class, 'id_tipo_evento');
    }

    public function coordenadaEvento()
    {
        return $this->hasOne(CoordenadaEvento::class, 'id_evento');
    }
}
