<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    protected $table = 'cargos';

    protected $fillable = [
        'nombre',
        'es_principal', // true / false
    ];

    /**
     * Un cargo puede ser ocupado por muchos representantes
     */
    public function representantes(): HasMany
    {
        return $this->hasMany(Representante::class, 'cargo_id');
    }
}
