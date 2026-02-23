<?php

namespace App\Livewire\Delegaciones\Components;

use App\Models\Delegacion;
use Livewire\Component;
use App\Models\Cargo;
use App\Models\Representante;

class Comite extends Component
{

    public $delegacionId;

    public $delegacion;

    public $cargos;
    public $representantes = [];





    public $titulo;
    public $nombre;
    public $apaterno;
    public $amaterno;
    public $genero;
    public $telefono;
    public $email;
    public $direccion;
    public $cp;
    public $ciudad;
    public $estado;


    public $showModal = false; // Esta es la variable vinculada al modal
    public $cargoSeleccionado;

    public function abrirModal($cargoId)
    {
        $this->cargoSeleccionado = Cargo::findOrFail($cargoId);
        // dd($this->cargoSeleccionado);

        // Llamas a tu función de limpieza
        $this->resetForm();

        // Al poner esto en true, el modal se abre automáticamente gracias al @entangle
        $this->showModal = true; 
    }


    // Reglas de validación
    protected function rules()
    {
        return [
            'titulo'    => 'required',
            'nombre'    => 'required|min:3|max:50',
            'apaterno'  => 'required|min:3',
            'amaterno'  => 'nullable|min:3', // El materno suele ser opcional en algunos casos
            'genero'    => 'required',
            'telefono'  => 'required|digits:10', // Valida que sean exactamente 10 números
            'email'     => 'required|email',
            'direccion' => 'required|min:10',
            'cp'        => 'required|digits:5',
            'ciudad'    => 'required',
            'estado'    => 'required',
        ];
    }

    // Mensajes personalizados
    protected function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'email'    => 'El correo electrónico no tiene un formato válido.',
            'digits'   => 'El campo :attribute debe tener exactamente :digits dígitos.',
            'min'      => 'El campo :attribute debe tener al menos :min caracteres.',
            'max'      => 'El campo :attribute no debe exceder los :max caracteres.',
        ];
    }

    // Los nombres amigables para los campos
    protected function validationAttributes()
    {
        return [
            'titulo'    => 'Título',
            'nombre'    => 'Nombre',
            'apaterno'  => 'Apellido Paterno',
            'amaterno'  => 'Apellido Materno',
            'genero'    => 'Género',
            'telefono'  => 'Teléfono',
            'email'     => 'Correo Electrónico',
            'direccion' => 'Dirección',
            'cp'        => 'Código Postal',
            'ciudad'    => 'Ciudad/Municipio',
            'estado'    => 'Estado',
        ];
    }    

    // Limpiar dators de formulario
    protected function resetForm()
    {
        $this->reset([
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
        ]);

        $this->titulo = "";
        $this->resetValidation();        
    }

    public function guardar()
    {
        $this->validate();
        
        // Cierra el modal tras la acción
        $this->showModal = false; 

        // Volvemos a limpiar para dejar todo listo para la próxima vez
        $this->resetForm();
    }


    

    public function mount($delegacionId)
    {
        // $this->delegacionId = $delegacionId;

        $this->delegacion = Delegacion::with('nomenclatura')->findOrFail($delegacionId);
        $this->cargoSeleccionado;

        $this->loadCargos();
        $this->loadRepresentantes();
    }

    public function render()
    {
        return view('livewire.delegaciones.components.comite');
    }

    private function loadCargos()
    {
        $this->cargos = Cargo::whereHas('nomenclaturas', function ($query) {
            $query->where('nomenclatura_id', $this->delegacion->nomenclatura_id);
        })
        ->orderBy('id')
        ->get();
    }

    private function loadRepresentantes()
    {
        // $this->representantes = Representante::where('delegacion_id', $this->delegacion->id)
        //     ->whereNull('deleted_at')
        //     ->get()
        //     ->keyBy('cargo_id');

        $this->representantes = Representante::with('persona')
            ->where('delegacion_id', $this->delegacion->id)
            ->whereNull('fecha_fin')
            ->get()
            ->keyBy('cargo_id');
    }

    // Valida que el cargo pertenece a la delegación
    public function asignarRepresentante(int $cargoId, int $personaId, bool $esPrincipal = false)
    {
        // 1. Verificar que el cargo pertenece a esta delegación (según nomenclatura)
        $cargoValido = $this->cargos->firstWhere('id', $cargoId);

        if (!$cargoValido) {
            abort(403, 'Cargo no válido para esta delegación.');
        }

        // 2. Cerrar representante actual si existe
        $actual = Representante::where('delegacion_id', $this->delegacion->id)
            ->where('cargo_id', $cargoId)
            ->whereNull('fecha_fin')
            ->first();

        if ($actual) {
            $actual->update([
                'fecha_fin' => now()
            ]);
        }

        // 3. Si el nuevo será principal, quitar principal anterior
        if ($esPrincipal) {
            Representante::where('delegacion_id', $this->delegacion->id)
                ->where('es_principal', true)
                ->whereNull('fecha_fin')
                ->update([
                    'es_principal' => false
                ]);
        }

        // 4. Crear nuevo representante
        Representante::create([
            'persona_id'    => $personaId,
            'cargo_id'      => $cargoId,
            'delegacion_id' => $this->delegacion->id,
            'es_principal'  => $esPrincipal,
            'fecha_inicio'  => now(),
            'fecha_fin'     => null,
        ]);

        // 5. Recargar representantes activos
        $this->loadRepresentantes();

        // 6. Evento opcional para notificación
        $this->dispatch('representanteActualizado');
    }

}
