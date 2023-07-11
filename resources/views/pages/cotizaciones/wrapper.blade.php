@extends('layouts.main')
@section('content')
    <div x-data="cotizaciones">
        <div class="flex">
            <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Agregar cotización
            </a>
        </div>

        <!-- cotizacion list -->
        <div class="relative pt-5">
            <div class="perfect-scrollbar -mx-2 h-full">
                <div class="flex flex-nowrap items-start gap-5 overflow-x-auto px-2 pb-2">
                    <template x-for="board in boards" :key="board.id">
                        <div class="panel w-80 flex-none">
                            <div class="mb-5 flex justify-between">
                                <h4 x-text="board.nombre" class="text-base font-semibold"></h4>
                            </div>
                            <div :id="`board-${board.id}`" class="sortable-list min-h-[150px]" :data-id="board.id">
                                <template x-for="cotizacion in board.cotizaciones">
                                    <div :id="`cotizacion-${cotizacion.id}`" :key="board.id + '' + cotizacion.id" :data-id="cotizacion.id"
                                        class="mb-5 cursor-move space-y-3 rounded-md bg-[#f4f4f4] p-3 pb-5 shadow dark:bg-[#262e40]">
                                        <div class="text-base font-medium" x-text="cotizacion.tituloCotizacion"></div>
                                        <p class="break-all" x-text="cotizacion.nombreActivo"></p>
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
                                                    @click="addEditTask(cotizacion.id, task)">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                                                        <path opacity="0.5"
                                                            d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" />
                                                        <path
                                                            d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                        <path opacity="0.5"
                                                            d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                </button>
                                                <button type="button" class="hover:text-danger"
                                                    @click="deleteConfirmModal(cotizacion.id, task)">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                        <path opacity="0.5"
                                                            d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                                        </path>
                                                        <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                        <path
                                                            d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>
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
        {{ $isAdmin }}
    </div>
@endsection
@section('scripts')
    <script>
        var boardsLaravel = @json($boards);
        var isAdmin = {{ json_encode($isAdmin) }}
    </script>
    <script src="/assets/js/Sortable.min.js"></script>
    <script src="/assets/js/cotizaciones.js"></script>
@endsection
