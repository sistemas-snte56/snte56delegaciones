<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CentroTrabajo extends Model
{
    protected $table = 'centros_trabajo';

    protected $fillable = [
        'region_id',
        'nivel_id',
        'nombre',
        'clave',        // C.T.-01
        'direccion',
        'cp',
        'ciudad',
        'estado',
    ];

    /**
     * El centro de trabajo pertenece a una región
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    /**
     * El centro de trabajo pertenece a un nivel educativo
     */
    public function nivel(): BelongsTo
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }

    /**
     * Un centro de trabajo tiene representantes
     */
    public function representantes(): HasMany
    {
        return $this->hasMany(Representante::class, 'centro_trabajo_id');
    }
}
