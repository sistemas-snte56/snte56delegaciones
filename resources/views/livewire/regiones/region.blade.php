<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Delegaciones</h2>

                <!-- BOTÓN CREAR PRODUCTO -->
                <button wire:click="create" class="mb-4 px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">
                    + Nueva Región
                </button>
            </div>

            <div class="overflow-x-auto">

             

                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-left text-sm">
                            <th class="px-3 py-2">Id</th>
                            <th class="px-3 py-2">Región</th>
                            <th class="px-3 py-2 text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($regiones as $region)
                            <tr class="border-t text-sm">
                                <td class="px-3 py-2">
                                    {{ $region->id ?? '-' }}
                                </td>

                                <td class="px-3 py-2 font-semibold">
                                    {{ $region->nombre }}
                                </td>

                                <td class="px-3 py-2 text-center space-x-2">

                                    <button wire:click="edit({{ $region->id }})"
                                        class="btn btn-sm btn-warning text-blue-600 hover:underline">
                                        Editar
                                    </button>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-3 py-6 text-center text-gray-500">
                                    No hay regiones registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </div>


    
        <!-- MODAL -->
        <div x-data="{ open: @entangle('showModal') }" x-cloak>
            <div x-show="open" x-transition.opacity class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                <div x-show="open" x-transition.scale.95 class="bg-white rounded-lg shadow-lg w-1/3 p-6" @keydown.escape.window="open = false">
                    
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        
                        <h3 class="text-xl font-extrabold text-gray-900 mb-4" x-text="$wire.tituloModal"></h3>
                        
                        <div class="grid grid-cols-12 gap-4 mb-4">
                            <div class="col-span-12"> 
                                <label class="block text-base mb-2 font-bold text-orange-600 tracking-wide">
                                    Nombre *
                                </label>
                                <input type="text" 
                                    id="nombre" 
                                    wire:model="nombre" 
                                    class="w-full h-12 border border-gray-400 rounded-md px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                                    placeholder="Ej: Región Norte">
                                
                                @error('nombre')
                                    <p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                        
                        
                        <button 
                            @click="open = false" 
                            type="button" 
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm"
                        >
                            Cancelar
                        </button>


                        <button wire:click="save" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-black focus:outline-none sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-50"
                        >
                        
                            <span x-text="$wire.regionId ? 'Actualizar' : 'Guardar'"></span>
                        </button>
                    </div>                    

                </div>
            </div>
        </div>

</div>




@script
<script type="text/javascript">
    $wire.on('success', (event) => {
        const data = event[0]; // Recibimos los datos del array
        Swal.fire({
            title: data.title,
            text: data.text,
            icon: data.icon,
            confirmButtonText: "Ok",
            confirmButtonColor: "#ee731c",
        });
    });
</script>
@endscript