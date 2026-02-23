<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="mt-8">

        <h3 class="text-lg font-semibold mb-4">
            Comité {{ $delegacion->clave }}
        </h3>



        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr class="text-left text-sm">
                    <th class="border px-3 py-2">Cargo</th>
                    <th class="border px-3 py-2">Representante</th>
                    <th class="border px-3 py-2">Acción</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cargos as $cargo)
                    <tr class="border-t text-sm">
                        <td class="border px-3 py-2">
                            {{ $cargo->nombre }}
                        </td>
                        

                        <td class="border px-3 py-2">
                            @if(isset($representantes[$cargo->id]))
                                {{ $representantes[$cargo->id]->nombre }}
                            @else
                                <span class="text-gray-400">
                                    Sin asignar
                                </span>
                            @endif

                            <button wire:click="abrirModal({{ $cargo->id }})" 
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                Abrir Modal
                            </button>









                            <div x-data="{ open: @entangle('showModal') }" x-cloak>
                                <form wire:submit.prevent='guardar'>
                                    <div x-show="open" 
                                        class="fixed inset-0 z-50 overflow-y-auto" 
                                        aria-labelledby="modal-title" 
                                        role="dialog" 
                                        aria-modal="true">
    
                                        <div class="flex items-center justify-center min-h-screen p-4 text-center sm:p-0">
                                            
                                            <div 
                                                x-show="open" 
                                                x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                class="fixed inset-0 bg-gray-700 bg-opacity-15 transition-opacity" 
                                            ></div>
    
                                            <div 
                                                x-show="open" 
                                                x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-4xl sm:w-full border border-gray-200"
                                            >
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    
                                                    
    
                                                    <h3 class="text-xl font-extrabold text-gray-900 mb-4">
                                                        Registro de Titular
                                                    </h3>
                                                
                                                    <div class="bg-orange-600 rounded-md px-4 py-2 mb-6 shadow-sm">
                                                        <p class="text-xs text-orange-100 uppercase font-bold tracking-wider">
                                                            Asignando a la Secretaría:
                                                        </p>
                                                        <p class="text-white font-bold text-lg leading-tight uppercase">
                                                            {{ $cargoSeleccionado?->nombre ?? 'Cargando posición...' }}
                                                        </p>
                                                    </div>
    
    
    
    
    
    
    
    
    
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-4">
                                                        
                                                        <div class="lg:col-span-2 md:col-span-3">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Título *</label>
                                                            <select id="titulo" wire:model="titulo" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                                <option value="" disabled >Selecciona</option>
                                                                <option value="PROF.">Prof.</option>
                                                                <option value="PROFA.">Profa.</option>
                                                                <option value="C.">C.</option>
                                                            </select>
                                                            @error('titulo')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-4 md:col-span-9">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Nombre *</label>
                                                            <input type="text" id="nombre" wire:model="nombre" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('nombre')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-3 md:col-span-6">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Apellido Paterno *</label>
                                                            <input type="text" id="apaterno" wire:model="apaterno" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('apaterno')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-3 md:col-span-6">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Apellido Materno *</label>
                                                            <input type="text" id="amaterno" wire:model="amaterno" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('amaterno')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-3 md:col-span-4">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Género *</label>
                                                            <select id="genero" wire:model="genero" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                                <option value="">-- Selecciona --</option>
                                                                <option value="MASCULINO">Masculino</option>
                                                                <option value="FEMENINO">Femenino</option>
                                                                <option value="OTRO">Otro</option>
                                                            </select>
                                                            @error('genero')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-3 md:col-span-4">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Teléfono *</label>
                                                            <input type="tel" id="telefono" wire:model="telefono" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('telefono')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-6 md:col-span-4">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Email *</label>
                                                            <input type="email" id="email" wire:model="email" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('email')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-12 md:col-span-12">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Dirección Completa *</label>
                                                            <input type="text" id="direccion" wire:model="direccion" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('direccion')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-3 md:col-span-4">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">C.P. *</label>
                                                            <input type="text" id="cp" wire:model="cp" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('cp')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-5 md:col-span-4">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Ciudad / Municipio *</label>
                                                            <input type="text" id="ciudad" wire:model="ciudad" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('ciudad')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                        <div class="lg:col-span-4 md:col-span-4">
                                                            <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">Estado *</label>
                                                            <input type="text" id="estado" wire:model="estado" class="w-full h-12 border rounded px-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                                            @error('estado')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
                                                        </div>
    
                                                    </div>
    
                                                </div>
    
                                                <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                                                    <button 
                                                        type="submit"
                                                        wire:loading.attr="disabled"
                                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-black focus:outline-none sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-50"
                                                    >
                                                        <span wire:loading wire:target="update" class="mr-2 italic">Procesando...</span>
                                                        Actualizar Datos
                                                    </button>
                                                    
                                                    <button 
                                                        @click="open = false" 
                                                        type="button" 
                                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm"
                                                    >
                                                        Cancelar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>











                        </td>

                        <td class="border px-3 py-2">
                            {{-- Aquí pondremos el botón luego --}}
                            <button wire:click="abrirAsignacion({{ $cargo->id }})">
                                Asignar
                            </button>                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
