<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nomenclatura extends Model
{
    protected $table = 'nomenclaturas';

    protected $fillable = [
        'codigo',       // D-I, D-II, D-III, D-IV, C.T.
        'descripcion',  // Texto descriptivo
        'tipo',         // ACTIVO | JUBILADO | CT
    ];

    /**
     * Una nomenclatura puede estar asociada a muchas delegaciones
     */
    public function delegaciones(): HasMany
    {
        return $this->hasMany(Delegacion::class, 'nomenclatura_id');
    }

    /**
     * Una nomenclatura puede estar asociada a muchos centros de trabajo
     */
    public function centrosTrabajo(): HasMany
    {
        return $this->hasMany(CentroTrabajo::class, 'nomenclatura_id');
    }
}
