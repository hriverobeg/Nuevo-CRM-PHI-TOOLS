@extends('layouts.main')
@section('content')
<div x-data="cotizaciones">
    <div class="flex justify-between">
        <x-buttonhref :href="route('cotizaciones.create')">Agregar cotización</x-buttonhref>
        <div>
            <div class="flex">
                <input x-model="buscar" type="text" placeholder="Buscar..." class="form-input" required />
            </div>
        </div>

    </div>

    <x-modaldeletecotizacion />
    <x-modalcotizacion :isAdmin="$isAdmin"></x-modalcotizacion>

    <!-- cotizacion list -->
    <div class="relative pt-5 h-full">
        <div class="perfect-scrollbar -mx-2 h-full">
            <div style="overflow-y: hidden" class="flex flex-nowrap h-full items-stretch gap-5 overflow-x-auto px-2 pb-2">
                <template x-for="board in filteredData" :key="board.id">
                    <div class="panel w-80 flex-none">
                        <div class="mb-5 flex justify-between">
                            <h4 x-text="board.nombre" class="text-base font-semibold"></h4>
                        </div>
                        <div :id="`board-${board.id}`" class="sortable-list min-h-[150px] h-full" :data-id="board.id">
                            <template x-for="cotizacion in board.cotizaciones">
                                <div :id="`cotizacion-${cotizacion.id}`" :key="board.id + '' + cotizacion.id" :data-id="cotizacion.id"
                                    class="mb-5 cursor-move space-y-3 rounded-md bg-[#f4f4f4] p-3 pb-5 shadow dark:bg-[#262e40]">
                                    <div class="text-base font-medium" x-text="titulo(cotizacion)"></div>
                                    <p class="break-all" x-text="cotizacion.nombreActivo"></p>
                                    <p class="text-red-500"></p>
                                    <div x-show="cotizacion?.from_user !== null">
                                        <p class="break-all" x-text="cotizacion?.from_user?.nombre"></p>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center font-medium hover:text-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 shrink-0 ltr:mr-3 rtl:ml-3">
                                                <path
                                                    d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <path opacity="0.5" d="M7 4V2.5" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path opacity="0.5" d="M17 4V2.5" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path opacity="0.5" d="M2 9H22" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                            <span x-text="cotizacion.fecha"></span>
                                        </div>
                                        <div class="flex items-center">
                                            <button type="button" class="hover:text-info"
                                                @click="onView(cotizacion)">
                                                <x-icons.view />
                                            </button>
                                            <button type="button" class="hover:text-danger"
                                                @click="onDelete(cotizacion)">
                                                <x-icons.delete />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                </template>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        var boardsLaravel = @json($boards);
        var isAdmin = {{ json_encode($isAdmin) }}
    </script>
    <script src="/assets/js/Sortable.min.js"></script>
    <script src="/assets/js/cotizaciones.js?v=1.0.7"></script>
    @vite('resources/js/pdf/main.js')
@endsection
