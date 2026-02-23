<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">
                    Delegaciones
                </h2>

                <a href="{{ route('admin.delegaciones.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Nueva Delegación
                </a>
            </div>

            <div class="overflow-x-auto">

                <!-- Buscar -->
                <div class="mb-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                        </div>
                        <input type="search" id="search" wire:model.live='search' class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Buscar" required />
                    </div>
                </div>                

                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-left text-sm">
                            <th class="px-3 py-2">Región</th>
                            <th class="px-3 py-2">Clave</th>
                            <th class="px-3 py-2">Nivel</th>
                            <th class="px-3 py-2">Sede</th>
                            <th class="px-3 py-2">Estatus</th>
                            <th class="px-3 py-2 text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($delegaciones as $delegacion)
                            <tr class="border-t text-sm">
                                <td class="px-3 py-2">
                                    {{ $delegacion->region->nombre ?? '-' }}
                                </td>

                                <td class="px-3 py-2 font-semibold">
                                    {{ $delegacion->clave }}
                                </td>

                                <td class="px-3 py-2">
                                    {{ $delegacion->nivel->nombre ?? '-' }}
                                </td>

                                <td class="px-3 py-2">
                                    {{ $delegacion->sede }}
                                </td>

                                <td class="px-3 py-2">
                                    <span class="px-2 py-1 rounded text-xs
                                        {{ $delegacion->estatus === 'ACTIVA'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-red-100 text-red-700' }}">
                                        {{ $delegacion->estatus }}
                                    </span>
                                </td>

                                <td class="px-3 py-2 text-center space-x-2">
                                    <a href="{{ route('admin.delegaciones.edit', $delegacion) }}"
                                        class="btn btn-sm btn-warning text-blue-600 hover:underline">
                                        Editar
                                    </a>
                                    <button 
                                        wire:click="$dispatch('confirm-delete',{ id:{{ $delegacion->id }}})" 
                                        class="text-orange-600 hover:underline">
                                        Cerrar
                                    </button>
                                    <button class="text-gray-600 hover:underline">
                                        Comité
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-3 py-6 text-center text-gray-500">
                                    No hay delegaciones registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $delegaciones->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@if (session()->has('success'))
    @script
        <script type="text/javascript">
            Swal.fire({
                title: "Excelente...",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "Ok",
                confirmButtonColor: "#ee731c",                
            });           
        </script>
    @endscript
@endif

@script
    <script type="text/javascript">
            $wire.on('confirm-delete',(data)=>{
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si confirma, llamamos a la función de PHP
                        $wire.eliminarDelegacion(data.id);
                    }
                });                
            });

            // 2. Escuchamos cuando PHP nos dice que ya se borró (el dispatch del componente)
            $wire.on('deleted', (event) => {
                Swal.fire({
                    title:  "¡Eliminado!",
                    text:   event.mensaje,
                    icon:   "success",
                    confirmButtonText: "Ok",
                    confirmButtonColor: "#ee731c",                     

                });
            }); 
    </script>
@endscript