<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Representante extends Model
{
    use SoftDeletes;
    protected $table = 'representantes';

    protected $fillable = [
        'persona_id',
        'cargo_id',
        'delegacion_id',
        'centro_trabajo_id',
        'es_principal',
        'fecha_inicio',
        'fecha_fin',
    ];

    /**
     * El representante pertenece a una persona
     */
    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    /**
     * El representante ocupa un cargo
     */
    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    /**
     * Representante en una delegación
     */
    public function delegacion(): BelongsTo
    {
        return $this->belongsTo(Delegacion::class, 'delegacion_id');
    }

    /**
     * Representante en un centro de trabajo
     */
    public function centroTrabajo(): BelongsTo
    {
        return $this->belongsTo(CentroTrabajo::class, 'centro_trabajo_id');
    }
}
