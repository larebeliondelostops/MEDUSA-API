<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la tabla 'reports'.
 *
 * @property int $id Identificador único del informe (serial).
 * @property string $name Nombre del informe.
 * @property string $description Descripción del informe.
 * @property string $date Fecha del informe.
 * @property int $project_id Clave foránea que relaciona el informe con un proyecto.
 * @property int $document_id Clave foránea que relaciona el informe con un documento.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class Report extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'reports';

    /**
     * Clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'date', 'project_id', 'document_id'
    ];

    /**
     * Relación muchos a uno con la tabla 'projects'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'bpin');
    }

    /**
     * Relación uno a uno con la tabla 'documents'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function document()
    {
        return $this->hasOne(Document::class, 'id', 'document_id');
    }
}
