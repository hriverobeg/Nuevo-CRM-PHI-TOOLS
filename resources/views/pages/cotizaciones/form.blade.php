@extends('layouts.main')
@section('content')
<ul class="flex space-x-2 rtl:space-x-reverse mb-5">
  <li>
      <a href="{{ route('cotizaciones.create') }}" class="text-primary hover:underline">Cotizaciones</a>
  </li>
  <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
      <span>Agregar</span>
  </li>
</ul>
<div id="cotizacion"></div>
@vite('resources/js/react/cotizacion/index.jsx')
@endsection