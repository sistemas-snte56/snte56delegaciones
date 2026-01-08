<main class="py-6">
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

                @if (session()->has('success'))
                    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
                        {{ session('success') }}
                    </div>
                @endif


                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-left text-sm">
                            <th class="px-3 py-2">Región</th>
                            <th class="px-3 py-2">Clave</th>
                            <th class="px-3 py-2">Tipo</th>
                            <th class="px-3 py-2">Nivel</th>
                            <th class="px-3 py-2">Sede</th>
                            <th class="px-3 py-2">Periodo</th>
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
                                    {{ $delegacion->tipo }}
                                </td>

                                <td class="px-3 py-2">
                                    {{ $delegacion->nivel->nombre ?? '-' }}
                                </td>

                                <td class="px-3 py-2">
                                    {{ $delegacion->sede }}
                                </td>

                                <td class="px-3 py-2">
                                    {{ $delegacion->fecha_inicio?->format('Y') }}
                                    -
                                    {{ $delegacion->fecha_fin?->format('Y') }}
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
                                    <button class="text-blue-600 hover:underline">
                                        Editar
                                    </button>

                                    <button class="text-orange-600 hover:underline">
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
            </div>
        </div>

    </div>
</main>
