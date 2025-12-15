<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = [
        'titulo',
        'nombre',
        'apaterno',
        'amaterno',
        'genero',
        'telefono',
        'email',
        'direccion',
        'cp',
        'ciudad',
        'estado',
    ];

    /**
     * Una persona puede tener un usuario del sistema
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'persona_id');
    }

    /**
     * Una persona puede tener un cargo sindical (representante)
     */
    public function representante(): HasOne
    {
        return $this->hasOne(Representante::class, 'persona_id');
    }

    /**
     * Nombre completo (para PDFs y vistas)
     */
    public function getNombreCompletoAttribute(): string
    {
        return trim(
            "{$this->titulo} {$this->nombre} {$this->apaterno} {$this->amaterno}"
        );
    }
}
