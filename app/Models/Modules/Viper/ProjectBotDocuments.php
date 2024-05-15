<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Model;

class ProjectBotDocuments extends Model
{
    
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'project_bot_documents';

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
        'deleted_at'
    ];

    protected $fillable = [
        'project_id',
        'document_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

}
