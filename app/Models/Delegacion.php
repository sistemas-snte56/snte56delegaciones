<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delegacion extends Model
{
    protected $table = 'delegaciones';

    protected $fillable = [
        'region_id',
        'nivel_id',
        'tipo',          // ACTIVO | JUBILADO
        'numero',        // 59
        'clave',         // D-II-59
        'sede',
        'direccion',
        'cp',
        'ciudad',
        'estado',
        'fecha_inicio',
        'fecha_fin',
    ];

    /**
     * La delegación pertenece a una región
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    /**
     * La delegación pertenece a un nivel educativo
     */
    public function nivel(): BelongsTo
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }

    /**
     * Una delegación tiene muchos representantes (comité)
     */
    public function representantes(): HasMany
    {
        return $this->hasMany(Representante::class, 'delegacion_id');
    }

    /**
     * Scope para delegaciones activas
     */
    public function scopeActivas($query)
    {
        return $query->where('tipo', 'ACTIVO');
    }

    /**
     * Scope para delegaciones de jubilados
     */
    public function scopeJubilados($query)
    {
        return $query->where('tipo', 'JUBILADO');
    }
}
