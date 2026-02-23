<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <form wire:submit.prevent="update">
                    <h2 class="text-xl font-bold mb-4">
                        Edición Delegación
                    </h2>


                    @if (session()->has('success'))
                        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif



                    {{-- Clave Delegacaional (solo lectura) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-4">
                        <div class="lg:col-span-3">
                            <label class="block mb-1 text-orange-600 font-semibold">Tipo *</label>
                            <input type="text"
                                value="{{$tipo}}"
                                readonly disabled
                                    class="w-full h-12 bg-gray-100 border border-gray-300 rounded px-3">
                        </div>                   

                        <div class="lg:col-span-6">
                            <label class="block mb-1 text-orange-600 font-semibold">
                                Clave Delegacional
                            </label>
                            <input type="text" value="{{ $clave }}" readonly disabled
                                class="w-full h-12 bg-gray-100 border border-gray-300 rounded px-3">                                
                        </div>                            

                        <div class="lg:col-span-3">
                            <label class="block mb-1 text-orange-600 font-semibold">Nivel *</label>
                            <select wire:model="nivel_id"
                                class="w-full h-12 border rounded px-3"
                                @if($tipo === 'CT') disabled @endif>
                                <option value="">Selecciona</option>
                                @foreach ($niveles as $nivel)
                                    <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                @endforeach
                            </select>
                            @error('nivel_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror                                
                        </div>                            

                    </div>





                    {{-- Región y Periodos --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-4">

                        <div class="lg:col-span-6">
                            <label class="block mb-1 text-orange-600 font-semibold">
                                Región <span class="text-red-600">*</span>
                            </label>
                            <select wire:model="region_id"
                                class="w-full h-12 border rounded px-3
                                @error('region_id') border-red-500 @else border-gray-300 @enderror">
                                <option value="">Selecciona</option>
                                @foreach ($regiones as $region)
                                    <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                @endforeach
                            </select>
                            @error('region_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <div class="lg:col-span-3">
                            <label class="block mb-1 text-orange-600 font-semibold">Periodo Inicial *</label>
                            <input type="date" wire:model="fecha_inicio"
                                class="w-full h-12 border rounded px-3
                                @error('fecha_inicio') border-red-500 @else border-gray-300 @enderror">
                            @error('fecha_inicio') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <div class="lg:col-span-3">
                            <label class="block mb-1 text-orange-600 font-semibold">Periodo Final *</label>
                            <input type="date" wire:model="fecha_fin"
                                class="w-full h-12 border rounded px-3
                                @error('fecha_fin') border-red-500 @else border-gray-300 @enderror">
                            @error('fecha_fin') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>
                    </div>


                    {{-- Ubicación --}}
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 mb-4">

                        <div class="lg:col-span-4">
                            <label class="block mb-1 text-orange-600 font-semibold">Sede *</label>
                            <input type="text" wire:model.defer="sede"
                                class="w-full h-12 border rounded px-3">
                            @error('sede') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <div class="lg:col-span-6">
                            <label class="block mb-1 text-orange-600 font-semibold">Dirección *</label>
                            <input type="text" wire:model.defer="direccion"
                                class="w-full h-12 border rounded px-3">
                            @error('direccion') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <div class="lg:col-span-2">
                            <label class="block mb-1 text-orange-600 font-semibold">C.P. *</label>
                            <input type="text" wire:model.defer="codigo_postal"
                                class="w-full h-12 border rounded px-3">
                            @error('codigo_postal') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Ciudad / Estado --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block mb-1 text-orange-600 font-semibold">Municipio *</label>
                            <input type="text" wire:model.defer="ciudad"
                                class="w-full h-12 border rounded px-3">
                            @error('ciudad') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block mb-1 text-orange-600 font-semibold">Estado *</label>
                            <input type="text" wire:model.defer="estado"
                                class="w-full h-12 border rounded px-3">
                            @error('estado') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Botones --}}
                    <div class="flex gap-4">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">
                            Actualizar Delegación
                        </button>

                        <button type="button" wire:click="delegaciones"
                            class="bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-700">
                            Cancelar
                        </button>
                    </div>




                   {{-- Ciudad / Estado --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-12">
                        <div>
                            <label class="block mb-1 text-orange-600 font-semibold">Municipio *</label>
                            <div class="w-full h-12 border border-gray-500 rounded px-3 flex items-center bg-gray-50">
                                {{ $ciudad }}
                            </div>
                        </div>
                    </div>                    

                </form>

                

                <hr class="my-6">

                <livewire:delegaciones.components.comite 
                    :delegacionId="$delegacion->id"
                    :key="'comite-'.$delegacion->id"
                />

            </div>
        </div>
    </div>
</div>