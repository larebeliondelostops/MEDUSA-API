<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Modelo Eloquent para la tabla 'phases'.
 *
 * @property string $id Identificador único de la fase.
 * @property string $name Nombre de la fase.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ProjectSheetDocument extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'project_sheet_document';

    /**
     * Clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son ocultado en masa.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'project_sheet_id',
        'document_id',
        'project_id'
    ];
    public function projectSheet()
    {
        return $this->belongsTo(ProjectSheet::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'bpin');
    }
}
