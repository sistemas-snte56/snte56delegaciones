<?php

namespace App\Livewire\Delegaciones;

use Livewire\Component;
use App\Models\Delegacion;

class Index extends Component
{
    protected string $layout = 'layouts.app';
    
    public function render()
    {
        return view('livewire.delegaciones.index', [
            'delegaciones' => Delegacion::with(['region','nivel','nomenclatura'])
                ->orderBy('clave')
                ->get(),
        ])->layout('layouts.app');
    }
}
