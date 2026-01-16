<?php

namespace App\Livewire\Delegaciones;

use Livewire\Component;
use Illuminate\Validation\Rule;

use App\Models\Delegacion;
use App\Models\Region;
use App\Models\Nivel;
use App\Models\Nomenclatura;

class Edit extends Component
{
    protected string $layout = 'layouts.app';

    public Delegacion $delegacion;

    // Campos editables
    public $region_id;
    public $nivel_id;
    public $nomenclatura_id;
    public $tipo;
    public $numero;
    public $estatus;
    public $fecha_inicio;
    public $fecha_fin;

    public $sede;
    public $direccion;
    public $codigo_postal;
    public $ciudad;
    public $estado;

    // Solo lectura
    public $clave;

    // Catálogos
    public $regiones;
    public $niveles;
    public $nomenclaturas;

    /**
     * Mount – carga inicial del estado
     */
    public function mount(Delegacion $delegacion)
    {
        $this->delegacion = $delegacion;
        
        $this->region_id        = $delegacion->region_id;
        $this->nivel_id         = $delegacion->nivel_id;
        $this->nomenclatura_id  = $delegacion->nomenclatura_id;
        $this->tipo             = $delegacion->tipo;
        $this->numero           = $delegacion->numero;
        $this->estatus          = $delegacion->estatus;

        $this->fecha_inicio     = optional($delegacion->fecha_inicio)->format('Y-m-d');
        $this->fecha_fin        = optional($delegacion->fecha_fin)->format('Y-m-d');

        $this->sede             = $delegacion->sede;
        $this->direccion        = $delegacion->direccion;
        $this->codigo_postal    = $delegacion->cp;
        $this->ciudad           = $delegacion->ciudad;
        $this->estado           = $delegacion->estado;

        $this->clave            = $delegacion->clave;

        // Catálogos
        $this->regiones         = Region::orderBy('nombre')->get();
        $this->niveles          = Nivel::orderBy('nombre')->get();
        $this->nomenclaturas    = Nomenclatura::orderBy('id')->get();
    }

    /**
     * Reglas de validación (FASE 5 – VALIDACIÓN COMPLETA)
     */
    protected function rules()
    {
        return [
            'region_id' => ['required', 'exists:regiones,id'],
            'nivel_id' => ['required', 'exists:niveles,id'],
            'nomenclatura_id' => ['required', 'exists:nomenclaturas,id'],

            'numero' => [
                'required',
                'numeric',
                Rule::unique('delegaciones')
                    ->where(fn ($query) =>
                        $query->where('region_id', $this->region_id)
                              ->where('nivel_id', $this->nivel_id)
                              ->where('nomenclatura_id', $this->nomenclatura_id)
                              ->where('estatus', 'ACTIVA')
                    )
                    ->ignore($this->delegacion->id),
            ],

            'tipo' => ['required', 'string'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],

            'sede' => ['required', 'string'],
            'direccion' => ['required', 'string'],
            'codigo_postal' => ['required', 'string'],
            'ciudad' => ['required', 'string'],
            'estado' => ['required', 'string'],
        ];
    }

    /**
     * Mensajes personalizados (mensajes de dominio)
     */
    protected $messages = [
        'numero.unique' => 'Ya existe una delegación ACTIVA con esta región, nivel, nomenclatura y número.',
        'fecha_fin.after_or_equal' => 'La fecha final debe ser igual o posterior a la fecha inicial.',
    ];

    /**
     * Update – guarda sin tocar la clave
     */
    public function update()
    {
        $this->validate();

        $this->delegacion->update([
            'region_id' => $this->region_id,
            'nivel_id' => $this->nivel_id,
            'nomenclatura_id' => $this->nomenclatura_id,
            'tipo' => $this->tipo,
            'numero' => $this->numero,
            'estatus' => $this->estatus,

            'sede' => $this->sede,
            'direccion' => $this->direccion,
            'cp' => $this->codigo_postal,
            'ciudad' => $this->ciudad,
            'estado' => $this->estado,

            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
        ]);

        return redirect()
            ->route('admin.delegaciones')
            ->with('success', 'Delegación actualizada correctamente.');
    }

    /**
     * Cancelar edición
     */
    public function delegaciones()
    {
        $this->redirectRoute('admin.delegaciones', navigate: true);
    }

    public function render()
    {
        return view('livewire.delegaciones.edit')
            ->layout('layouts.app');
    }
}
