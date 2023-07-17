@extends('layouts.main')
@section('content')
<h2 class="text-2xl mb-4">Cotizaciones</h2>
<div class="flex gap-4 wrap mb-5">
    <x-card.dashboard nombre="Enviadas" :value="$enviadas" />
    <x-card.dashboard nombre="Aceptadas" :value="$aceptadas" />
    <x-card.dashboard nombre="Autorizadas" :value="$autorizadas" />
    <x-card.dashboard nombre="Ejecutadas" :value="$ejecutadas" />
    <x-card.dashboard nombre="Rechazadas" :value="$rechazadas" />
</div>
<h2 class="text-2xl mb-4">Clientes</h2>
<div class="mb-5">
    <x-card.dashboard nombre="Clientes" :value="$clientesCount" />
</div>
<h2 class="text-2xl mb-4">Usuarios</h2>
<div class="mb-5">
    <x-card.dashboard bg="info" nombre="Usuarios" :value="$usuariosCount" />
</div>

@endsection
