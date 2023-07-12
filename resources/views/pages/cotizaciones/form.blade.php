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
  <x-buttonhref :href="route('clientes.index')">Agregar cliente</x-buttonhref>
  <x-buttonhref :href="route('usuarios.index')">Agregar usuario</x-buttonhref>
</div>
<div id="cotizacion"></div>
<script>
  window.Laravel = {};
  Laravel.clientes = @json($clientes);
  Laravel.usuarios = @json($usuarios);
</script>
@vite('resources/js/react/cotizacion/index.jsx')
@endsection