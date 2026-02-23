<?php

namespace App\Livewire\Regiones;

use Livewire\Component;
use App\Models\Region as Regiones;

class Region extends Component
{
    /** Prodiedades del modal */
    public $regionId = null;
    public $nombre;
    public $tituloModal = 'Crear Región';
    public $showModal = false;

    /**
     * @return \Illuminate\View\View|\Livewire\Features\SupportPageComponents\HandlesPageComponents
     */

    /** Render */
    public function render()
    {
        // Trae las regiones 
        $regiones = Regiones::all();
        // dd($regiones);
        return view('livewire.regiones.region', compact('regiones'))->layout('layouts.app');
    }  

    /** Modal para crear */
    public function create()
    {
        $this->resetFields();
        $this->resetErrorBag(); // Limpia errores anteriores        
        $this->tituloModal = 'Crear Región';
        $this->showModal = true;
    }

    /** Modal para editar */
    public function edit($id)
    {
        $this->resetValidation();  // Limpia errores primero
        $region = Regiones::findOrFail($id);
        $this->regionId = $region->id;
        $this->nombre = $region->nombre;
        $this->tituloModal = 'Editar Región';
        
        $this->showModal = true;
    }

    // Reglas de validación    
    protected function rules()
    {
        return [
            'nombre' => ['required','string'],
        ];
    }

    // Mensajes personalizados    
    protected function messages()
    {
        return [
            'nombre.required' => 'El campo :attribute es obligatorio.',
            'nombre.string' => 'El campo :attribute debe ser una cadena de texto.',
        ];
    }

    // Los nombres amigables para los campos    
    protected function getValidationAttributes()
    {
        return [
            'nombre' => 'Nombre',
        ];
    }
    
    /** Guardar producto (crear / editar) */
    public function save()
    {
        $this->validate();
    
        if ($this->regionId) {
            # Actualizar
            Regiones::find($this->regionId)->update([
                'nombre' => mb_strtoupper($this->nombre,'UTF-8'),
            ]);
            $mensaje = '¡Región actualizada exitosamente!';
        } else {
            # Crear
            Regiones::create([
                'nombre' => mb_strtoupper($this->nombre,'UTF-8'),
            ]);
            $mensaje = '¡Región creada exitosamente!';
        }

        $this->resetFields(); // Limpia propiedades del formulario
        $this->resetErrorBag(); // Limpia errores de validación
        $this->showModal = false; // Cierra modal

        // Lanzamos el evento para el navegador
        $this->dispatch('success', [
            'title' => 'Excelente...',
            'text'  => $mensaje,
            'icon'  => 'success',
        ]);        
    }

    /** Resetamos campos */
    public function resetFields()
    {
        $this->regionId = null;
        $this->nombre = null;
        $this->tituloModal = 'Crear Región';
    }
    
}
