@extends('layouts.main')
@section('content')
<div class="mb-5 flex items-center justify-between">
    <h5 class="text-lg font-semibold dark:text-white-light">Perfil</h5>
</div>
<div x-data="{tab: '{{ app('request')->input('tab') ?? 'home' }}'}">
    <ul class="mb-5 overflow-y-auto whitespace-nowrap border-b border-[#ebedf2] font-semibold dark:border-[#191e3a] sm:flex">
        <li class="inline-block">
            <a
                href="javascript:;"
                class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary"
                :class="{'!border-primary text-primary' : tab == 'home'}"
                @click="tab='home'"
            >
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                    <path
                        opacity="0.5"
                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    />
                    <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                Información general
            </a>
        </li>
        <li class="inline-block">
            <a
                href="javascript:;"
                class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary"
                :class="{'!border-primary text-primary' : tab == 'expediente'}"
                @click="tab='expediente'"
            >
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                    <path d="M12 6V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                    />
                </svg>
                Expediente de crédito
            </a>
        </li>
    </ul>
    <template x-if="tab === 'home'">
        <div>
            <form method="POST" action="/clientes/{{  $usuario->id }}" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                @csrf
                @method('PUT')
                <h6 class="mb-5 text-lg font-bold">Información general</h6>
                <div class="flex flex-col sm:flex-row">
                    <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="nombre">Nombre completo</label>
                            <input value="{{ $usuario->nombre }}" id="nombre" name="nombre" type="text" placeholder="Nombre completo" class="form-input" />
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input value="{{ $usuario->email }}" id="email" name="email" type="text" placeholder="Email" class="form-input" />
                        </div>
                        <div>
                            <label for="telefono">Teléfono</label>
                            <input value="{{ $usuario->telefono }}" id="telefono" name="telefono" type="text" placeholder="Teléfono" class="form-input" />
                        </div>
                        <div>
                            <label for="empresa">Empresa</label>
                            <input value="{{ $usuario->empresa }}" id="empresa" name="empresa" type="text" placeholder="Empresa" class="form-input" />
                        </div>
                        <div>
                            <label for="direccion_empresa">Dirección de la empresa</label>
                            <input value="{{ $usuario->direccion_empresa }}" name="direccion_empresa" id="direccion_empresa" type="text" placeholder="Dirección de la empresa" class="form-input" />
                        </div>
                        <div>
                            <label for="giro_empresa">Giro de la empresa</label>
                            <input value="{{ $usuario->giro_empresa }}" id="giro_empresa" name="giro_empresa" type="text" placeholder="Giro de la empresa" class="form-input" />
                        </div>
                        <div>
                            <label for="website_empresa">Website de la empresa</label>
                            <input value="{{ $usuario->website_empresa }}" id="website_empresa" name="website_empresa" type="text" placeholder="Website de la empresa" class="form-input" />
                        </div>

                        <div class="mt-3 sm:col-span-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </template>
    <template x-if="tab === 'expediente'">
        <div>
            <form method="POST" action="/usuario_archivo" enctype="multipart/form-data" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                @csrf
                <input type="hidden" name="user_id" value="{{ $usuario->id }}">
                <h6 class="mb-5 text-lg font-bold">Expediente de crédito</h6>
                <div class="flex flex-col sm:flex-row">
                    <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                        <h5 class="text-lg font-bold md:col-span-2">Información general</h5>
                        <x-file :files="$identificacionRepresentanteLegal" name="identificacion_representante_legal" label="Identificación de representante legal"/>
                        <x-file :files="$comprobante_docimicilio_representante" name="comprobante_docimicilio_representante" label="Comprobante de domicilio representante legal"/>
                        <x-file :files="$comprobante_docimicilio_empresa" name="comprobante_docimicilio_empresa" label="Comprobante de domicilio de la empresa"/>
                        <h5 class="text-lg font-bold md:col-span-2 mt-4">Información financiera</h5>
                        <x-file :files="$curriculum_empresa" name="curriculum_empresa" label="Curriculum de la empresa"/>
                        <x-file :files="$formato_buro_legal" name="formato_buro_legal" label="Formato de autorización de buró de crédito representante legal"/>
                        <x-file :files="$formato_buro_empresa" name="formato_buro_empresa" label="Formato de autorización de buró de crédito de empresa"/>
                        <x-file :files="$declaracion_isr" name="declaracion_isr" label="Declaración ISR año en curso más reciente"/>
                        <x-file :files="$acuse_isr_reciente" name="acuse_isr_reciente" label="Acuse de recibo de declaración ISR año en curso más reciente"/>
                        <x-file :files="$declaracion_isr_last_year" name="declaracion_isr_last_year" label="Declaración anual ISR último año"/>
                        <x-file :files="$acuse_recibo_isr_last_year" name="acuse_recibo_isr_last_year" label="Acuse de recibo de declaración anual ISR último año"/>
                        <x-file :files="$declaracion_isr_penultimo_year" name="declaracion_isr_penultimo_year" label="Declaración anual ISR penúltimo año"/>
                        <x-file :files="$acuse_isr_penultimo_year" name="acuse_isr_penultimo_year" label="Acuse de recibo de declaración anual ISR penúltimo año"/>
                        <x-file :files="$estados_financieros" name="estados_financieros" label="Estados financieros y analíticas año en curso más reciente"/>
                        <x-file :files="$estados_financieros_last_year" name="estados_financieros_last_year" label="Estados financieros y analíticas último año"/>
                        <x-file :files="$estados_financieros_penultimo_year" name="estados_financieros_penultimo_year" label="Estados financieros y analíticas penúltimo año"/>
                        <x-file :files="$estados_bancarios_3_meses" name="estados_bancarios_3_meses" label="Estados de cuenta bancarios últimos 3 meses"/>
                        <h5 class="text-lg font-bold md:col-span-2 mt-4">Información legal</h5>
                        <x-file :files="$constancia_fiscal" name="constancia_fiscal" label="Constancia de situación fiscal"/>
                        <x-file :files="$acta_constitutiva" name="acta_constitutiva" label="Acta constitutiva y acta de asamblea"/>
                        <x-file :files="$opinion_cumplimiento" name="opinion_cumplimiento" label="Opinión de cumplimiento"/>
                    </div>
                </div>
                <div class="mt-3 sm:col-span-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </template>
</div>
@endsection
