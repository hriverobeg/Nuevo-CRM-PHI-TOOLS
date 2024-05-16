@extends('layouts.main')
@section('content')
<ul class="flex space-x-2 rtl:space-x-reverse mb-5">
  <li>
      <a href="{{ route('cotizaciones.index') }}" class="text-primary hover:underline">Cotizaciones</a>
  </li>
  <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
      <span>Agregar</span>
  </li>
</ul>
<div class="flex gap-5 mb-5">
    @if ($isAdmin)
    <x-buttonhref :href="route('clientes.index')">Agregar usuario</x-buttonhref>
    @else
    <x-buttonhref :href="route('vendedor-externo.index')">Agregar vendedor externo</x-buttonhref>
    @endif
</div>
<div id="cotizacion"></div>
<script>
  window.Laravel = {};
  Laravel.clientes = @json($clientes);
  Laravel.nivelId = {{ $nivelId }};
  Laravel.usuarios = @json($usuarios);
  Laravel.isAdmin = {{ json_encode($isAdmin) }}
  Laravel.interes = {{ $interes }}
  Laravel.comisionPorcentaje = {{ $comisionPorcentaje }}
</script>
@viteReactRefresh
@vite('resources/js/react/cotizacion/index.jsx')
@endsection
