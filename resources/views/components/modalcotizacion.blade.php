<div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60 px-4" :class="isModalCotizacion && '!block'">
    <div class="flex min-h-screen items-center justify-center">
        <div
            x-show="isModalCotizacion"
            x-transition
            x-transition.duration.300
            @click.outside="isModalCotizacion = false"
            class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full"
        >
            <button
                type="button"
                class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                @click="isModalCotizacion = false"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24px"
                    height="24px"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="h-6 w-6"
                >
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div
                class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                x-text="row?.tituloCotizacion" />
            </div>
            <div class="p-5">
                <div class="mb-4 text-center">
                    <img class="h-[95px] m-auto" x-show="row?.tipoActivo === 'C-std'" src="{{ asset('assets/images/computadoras.webp') }}" alt="Computadoras">
                    <img class="h-[95px] m-auto" x-show="row?.tipoActivo === 'V-std'"  src="{{ asset('assets/images/sedan.png') }}" alt="Sedán">
                    <img class="h-[95px] m-auto" x-show="row?.tipoActivo === 'B-std'" src="{{ asset('assets/images/suv.png') }}" alt="SUV">
                    <img class="h-[95px] m-auto" x-show="row?.tipoActivo === 'otro'" src="{{ asset('assets/images/otro.jpeg') }}" alt="otro">
                </div>
                <x-cotizacion.item titulo="Datos del activo">
                    <div x-text="row?.nombreActivo"></div>
                </x-cotizacion.item>
                <x-cotizacion.item titulo="Año">
                    <div x-text="row?.anio"></div>
                </x-cotizacion.item>
                <x-cotizacion.item titulo="Valor del activo">
                    <div x-text="numeroComas(row?.valorActivo)"></div>
                </x-cotizacion.item>
                <x-cotizacion.item titulo="Anticipo">
                    <div x-text="numeroComas(row?.anticipo)"></div>
                </x-cotizacion.item>
                <x-cotizacion.item titulo="Comisión por apertura">
                    <div x-text="numeroComas(row?.comisionPorApertura)"></div>
                </x-cotizacion.item>
                @if ($isAdmin)
                <x-cotizacion.item titulo="Tasa de interés">
                    <div x-text="`${row?.interes}%`"></div>
                </x-cotizacion.item>
                @endif
                <x-cotizacion.item x-show="row?.isSeguro" titulo="Seguro">
                    <div x-text="numeroComas(row?.valorSeguro)"></div>
                </x-cotizacion.item>
                <x-cotizacion.item titulo="¿Tiene telematics?">
                    <div x-text="row?.isTelematics ? 'Si' : 'No'"></div>
                </x-cotizacion.item>
                <x-cotizacion.item titulo="¿Tiene alivio fiscal?">
                    <div x-text="row?.isAlivioFiscal ? 'Si' : 'No'"></div>
                </x-cotizacion.item>
                <x-cotizacion.item titulo="Descargar cotización">
                    <button x-show="isLoadingPdf" type="button" class="btn btn-primary btn-sm"><span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 ltr:mr-4 rtl:ml-4 inline-block align-middle"></span></button>
                    <button x-show="!isLoadingPdf" class="btn btn-primary btn-sm" @click="downloadPdf()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                            <path opacity="0.5" d="M3 15C3 17.8284 3 19.2426 3.87868 20.1213C4.75736 21 6.17157 21 9 21H15C17.8284 21 19.2426 21 20.1213 20.1213C21 19.2426 21 17.8284 21 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12 3V16M12 16L16 11.625M12 16L8 11.625" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        PDF
                    </button>
                </x-cotizacion.item>
            </div>
        </div>
    </div>
  </div>
