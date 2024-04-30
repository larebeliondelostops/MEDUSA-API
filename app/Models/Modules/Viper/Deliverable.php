<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deliverable extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'deliverables';
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'number',
        'name',
        'min_date',
        'max_date',
        'activity_quantity',
        'value',
        'product_id',
        'deliverable_id',
        'folder_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($deliverable) {
            // Elimina la carpeta asociada al deliverable
            if ($deliverable->folder) {
                $deliverable->folder->delete();
            }

            // Elimina los hijos
            foreach ($deliverable->childDeliverables as $child) {
                $child->delete(); // Esto respetará el soft delete
            }
        });
    }

    /**
     * Get the activities associated with the deliverable
     */
    public function activities()
    {
        return $this->hasMany(Activity::class, 'deliverable_id');
    }

    /**
     * Get the product associated with the deliverable.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get the folder associated with the deliverable.
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }

    /**
     * Get the parent deliverable associated with the deliverable.
     */
    public function parentDeliverable()
    {
        return $this->belongsTo(Deliverable::class, 'deliverable_id');
    }

    /**
     * Get the child deliverables for the deliverable.
     */
    public function childDeliverables()
    {
        return $this->hasMany(Deliverable::class, 'deliverable_id');
    }

    public function deliverables()
    {
        return $this->childDeliverables()->with('deliverables')->with('activities');
    }

    public function allParents()
    {
        return $this->parentDeliverable()->with('allParents');
    }

    /**
     * Get all descendants of the deliverable.
     */
    public function allParentsOfDeliverableWithDescendants()
    {
        return $this->parentDeliverable()->with('allParentsOfDeliverableWithDescendants')->with('childDeliverables')->with('activities');
    }

        /**
     * Get all descendants of the deliverable.
     */
    public function allDeliverablesWithDescendants()
    {
        return $this->childDeliverables()->with('allParents')->with('childDeliverables');
    }
}
