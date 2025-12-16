<?php

namespace App\Livewire\Delegaciones;

use Livewire\Component;
use App\Models\Delegacion;
use App\Models\Region;
use App\Models\Nivel;
use App\Models\Nomenclatura;

class Create extends Component
{
    public $region_id;
    public $regiones = [];
    public $fecha_inicio;
    public $fecha_final;

    public $tipo;
    public $nomenclatura_id;
    public $nomenclatura;
    public $nomenclaturas = [];
    public $nivel_id;
    public $niveles = [];
    public $numero;

    public $sede;
    public $direccion;
    public $codigo_postal;

    public $ciudad;
    public $estado;
    
    public $clave = '';


    // Reglas de validación
    protected $rules = [
        'region_id' => 'required',
        'fecha_inicio' => 'required|date',
        'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        'tipo' => 'required',
        'nomenclatura_id' => 'required',
        'numero' => 'required|numeric',
        'nivel_id' => 'required',
        'sede' => 'required|string',
        'direccion' => 'required|string',
        'codigo_postal' => 'required|numeric',
        'ciudad' => 'required|string',
        'estado' => 'required|string',
    ];    

    // Mensajes personalizados
    protected $messages = [
        'region_id.required' => 'Debes seleccionar una región.',
        'fecha_inicio.required' => 'Debes seleccionar la fecha inicial.',
        'fecha_final.required' => 'Debes seleccionar la fecha final.',
        'fecha_final.after_or_equal' => 'La fecha final debe ser igual o posterior a la fecha inicial.',
        'tipo.required' => 'Debes seleccionar el tipo de delegación.',
        'nomenclatura.required' => 'Debes seleccionar una nomenclatura.',
        'numero.required' => 'El número delegacional es obligatorio.',
        'numero.numeric' => 'El número delegacional debe ser numérico.',
        'nivel_id.required' => 'Debes seleccionar el nivel educativo.',
        'sede.required' => 'Debes ingresar la sede.',
        'direccion.required' => 'Debes ingresar la dirección.',
        'codigo_postal.required' => 'Debes ingresar el código postal.',
        'codigo_postal.numeric' => 'El código postal debe ser numérico.',
        'ciudad.required' => 'Debes ingresar la ciudad.',
        'estado.required' => 'Debes ingresar el estado.',
    ];    

    public function mount()
    {
        $this->regiones = Region::orderBy('nombre')->get();
        $this->niveles = Nivel::orderBy('nombre')->get();
    }
    
    
    public function updatedTipo($value)
    {
        $this->nomenclatura = '';

        if ($value) {
            $this->nomenclaturas = Nomenclatura::where('tipo',$value)->get();
        } else {
            $this->nomenclaturas = [];
        }
    }

    public function updatedNumero()
    {
        $this->generarClave();
    }

    public function generarClave()
    {
        if ($this->nomenclatura_id && $this->numero !== null) {
            $nomenclatura = Nomenclatura::find($this->nomenclatura_id);
            if ($nomenclatura) {
                $numeroFormateado = str_pad($this->numero, 2, '0', STR_PAD_LEFT);
                $this->clave = "{$nomenclatura->codigo}{$numeroFormateado}";
                # code...
            }
        } else {
            $this->clave = '';
        }


    }


    public function updatedClave($value)
    {
        dd($value);
        
        // Solo validar si hay valor
        if ($value) {
            $existe = Delegacion::where('clave',$value)
                ->where('estatus','ACTIVA')
                ->exists();
            if ($existe) {
                $this->addError('clave','La delegación ya está en uso por una delegación activa.');
            } else {
                $this->resetErrorBag('clave'); // Quita el error si ya no existe
            }
        }
    }    

    public function guardar()
    {
        $this->validate();

        $clave = $this->generarClave();

        $existe = Delegacion::where('clave', $clave)
            ->where('estatus', 'ACTIVA')
            ->exists();

        if ($existe) {
            $this->addError('numero', 'La delegación ya está en uso por una delegación activa.');
            return;
        }

        // Solo para ver los datos
        /*dd([
            'region_id' => $this->region_id,
            'nivel_id' => $this->nivel_id,
            'tipo' => $this->tipo,
            'numero' => $this->numero,
            'clave' => $this->clave, // si se genera automáticamente            
            'estatus'   => 'ACTIVA',
            'nomenclatura_id' => $this->nomenclatura_id,
            'sede' => $this->sede,
            'direccion' => $this->direccion,
            'cp' => $this->codigo_postal,
            'ciudad' => $this->ciudad,
            'estado' => $this->estado,
            'fecha_inicio' => $this->fecha_inicio,  // tipo date
            'fecha_final' => $this->fecha_final,    // tipo date
        ]);*/
                
        Delegacion::create([
            'region_id' => $this->region_id,
            'nivel_id' => $this->nivel_id,
            'tipo' => $this->tipo,
            'numero' =>  $this->numero,
            'clave' => $this->clave, // si se genera automáticamente            
            'estatus'   => 'ACTIVA',
            'nomenclatura_id' => $this->nomenclatura_id,
            'sede' => mb_strtoupper($this->sede,'UTF-8'),
            'direccion' => mb_strtoupper($this->direccion,'UTF-8'),
            'cp' => $this->codigo_postal,
            'ciudad' => mb_strtoupper($this->ciudad,'UTF-8'),
            'estado' => mb_strtoupper($this->estado,'UTF-8'),
            'fecha_inicio' => $this->fecha_inicio,  // tipo date
            'fecha_fin' => $this->fecha_final,    // tipo date
        ]);

        session()->flash('success', 'Delegación creada correctamente.');

        $this->reset();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.delegaciones.create');
    }
}
