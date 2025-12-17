<main>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form wire:submit.prevent='guardar'>
                        <h2 class="text-xl font-bold mb-4">Alta de Delegación</h2>
    
                        @if (session()->has('success'))
                        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                        @endif
    
                        <!-- Región, Periodo Inicial, Periodo Final -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-4">
                            <div class="lg:col-span-4">
                                <label for="region_id" class="block mb-1 text-orange-600 font-semibold">
                                    Selecciona Región <span class="text-red-600">*</span>
                                </label>
                                <select id="region_id" wire:model="region_id" class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('region_id') border-red-500 @else border-gray-300 @enderror">
                                    <option value="">Selecciona</option>
                                    @foreach ($regiones as $region)
                                    <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="sm:col-span-1 lg:col-span-4">
                                <label for="fecha_inicio" class="block mb-1 text-orange-600 font-semibold">
                                    Periodo Inicial <span class="text-red-600">*</span>
                                </label>
                                <input id="fecha_inicio" type="date" wire:model="fecha_inicio" class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('fecha_inicio') border-red-500 @else border-gray-300 @enderror" />
                                @error('fecha_inicio')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="sm:col-span-1 lg:col-span-4">
                                <label for="fecha_final" class="block mb-1 text-orange-600 font-semibold">
                                    Periodo Final <span class="text-red-600">*</span>
                                </label>
                                <input id="fecha_final" type="date" wire:model="fecha_final" class="w-full h-12 border rounded px-3 p-2
                                focus:outline-none focus:ring-2 focus:ring-blue-600
                                @error('fecha_final') border-red-500 @else border-gray-300 @enderror" />
                                @error('fecha_final')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
    
                        <!-- Tipo de Delegación, Nomenclatura, Número Delegacional, Nivel Educativo -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-4">
                            <div class="lg:col-span-3">
                                <label for="tipo" class="block mb-1 text-orange-600 font-semibold">
                                    Selecciona el tipo de Delegación <span class="text-red-600">*</span>
                                </label>
                                <select id="tipo" wire:model.live="tipo" class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('tipo') border-red-500 @else border-gray-300 @enderror">
                                    <option value="">Seleccione</option>
                                    <option value="ACTIVO">Activos</option>
                                    <option value="JUBILADO">Jubilados</option>
                                    <option value="CT">Centro de Trabajo</option>
                                </select>
                                @error('tipo')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="lg:col-span-3">
                                <label for="nomenclatura" class="block mb-1 text-orange-600 font-semibold">
                                    Selecciona la Nomenclatura <span class="text-red-600">*</span>
                                </label>
                                <select id="nomenclatura" wire:model="nomenclatura_id" class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('nomenclatura') border-red-500 @else border-gray-300 @enderror">
                                    <option value="">Seleccione</option>
                                    @foreach ($nomenclaturas as $nom)
                                    <option value="{{ $nom->id }}">{{ $nom->codigo }}</option>
                                    @endforeach
                                </select>
                                @error('nomenclatura')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="lg:col-span-3">
                                <label for="numero" class="block mb-1 text-orange-600 font-semibold">
                                    Número Delegacional <span class="text-red-600">*</span>
                                </label>
                                <input id="numero" type="text" wire:model.live="numero" placeholder="Ingresa número" class="w-full h-12 border rounded px-3 p-2
                                focus:outline-none focus:ring-2 focus:ring-blue-600
                                @error('numero') border-red-500 @else border-gray-300 @enderror" />
                                @error('numero')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="lg:col-span-3">
                                <label for="nivel_id" class="block mb-1 text-orange-600 font-semibold">
                                    Nivel Educativo Delegacional <span class="text-red-600">*</span>
                                </label>
                                <select id="nivel_id" wire:model="nivel_id" class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('nivel_id') border-red-500 @else border-gray-300 @enderror">
                                    <option value="">Selecciona un nivel</option>
                                    @foreach ($niveles as $nivel)
                                    <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('nivel_id')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
    
                        <!-- Sede, Dirección, Código Postal -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-4">
                            <div class="lg:col-span-4">
                                <label for="sede" class="block mb-1 text-orange-600 font-semibold">
                                    Sede <span class="text-red-600">*</span>
                                </label>
                                <input id="sede" type="text" wire:model.live="sede" placeholder="Cuál es la sede" class="w-full h-12 border rounded px-3 p-2
                                focus:outline-none focus:ring-2 focus:ring-blue-600
                                @error('sede') border-red-500 @else border-gray-300 @enderror" />
                                @error('sede')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="lg:col-span-6">
                                <label for="direccion" class="block mb-1 text-orange-600 font-semibold">
                                    Dirección <span class="text-red-600">*</span>
                                </label>
                                <input id="direccion" type="text" wire:model.live="direccion"
                                    placeholder="Ingresa la dirección" class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('direccion') border-red-500 @else border-gray-300 @enderror" />
                                @error('direccion')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="lg:col-span-2">
                                <label for="codigo_postal" class="block mb-1 text-orange-600 font-semibold">
                                    Código Postal <span class="text-red-600">*</span>
                                </label>
                                <input id="codigo_postal" type="text" wire:model.live="codigo_postal" placeholder="C.P."
                                    class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('codigo_postal') border-red-500 @else border-gray-300 @enderror" />
                                @error('codigo_postal')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
    
                        <!-- Ciudad, Estado -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-4">
                            <div class="sm:col-span-1 lg:col-span-6">
                                <label for="ciudad" class="block mb-1 text-orange-600 font-semibold">
                                    Municipio <span class="text-red-600">*</span>
                                </label>
                                <input id="ciudad" type="text" wire:model.live="ciudad" placeholder="Ingresa la ciudad"
                                    class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('ciudad') border-red-500 @else border-gray-300 @enderror" />
                                @error('ciudad')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <div class="sm:col-span-1 lg:col-span-6">
                                <label for="estado" class="block mb-1 text-orange-600 font-semibold">
                                    Estado <span class="text-red-600">*</span>
                                </label>
                                <input id="estado" type="text" wire:model.live="estado" placeholder="Ingresa el estado"
                                    class="w-full h-12 border rounded px-3 p-2
                                    focus:outline-none focus:ring-2 focus:ring-blue-600
                                    @error('estado') border-red-500 @else border-gray-300 @enderror" />
                                @error('estado')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
    
                        <!-- Delegación generada -->
                        <div class="mb-4">
                            <label for="clave" class="block mb-1 text-orange-600 font-semibold">
                                Delegación Generada
                            </label>
                            <input id="clave" type="text" wire:model="clave" readonly
                                class="w-full border rounded p-2 bg-gray-100" />

                            @error('clave')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

    
                        <!-- Botón Guardar -->
                        <div>
                            <button type="submit" wire:loading.attr='disabled' class="bg-blue-600 text-white px-6 py-3 rounded w-full sm:w-auto
                             focus:outline-none focus:ring-4 focus:ring-blue-400
                             hover:bg-blue-700 transition-colors duration-200">
                                Guardar Delegación
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</main>