@extends('layouts.main')
@section('content')
<x-table titulo="Cotizaciones" noForm clickAdd="/cotizaciones/create">
    <x-modaldeletecotizacion />
    <x-modalcotizacion :isAdmin="$isAdmin"></x-modalcotizacion>
</x-table>
@endsection
@section('scripts')
<script>
  var dataLaravel = @json($list);
  var headings = ['ID', 'Fecha de creación', 'Usuario', 'Tipo de archivo', 'Nombre del activo', 'Valor del activo', 'Tasa de interés', 'Detalle', 'Eliminar', 'Imprimir PDF', 'Imprimir PDF Grupo']
  var data = dataLaravel.map(m => ([`AP-${padWithLeadingZeros(m.id, 5)}`, m.fecha, m.to_user?.nombre ?? '-', m.tipoActivoNombre,  m.nombreActivo,  numeroComas(m.valorActivo),  `${m.interes}%`,  m.id,  m.id,  m.id,  `${m.id}-${m.grupo}`]))
  var page = '/admin'

  function padWithLeadingZeros(num, totalLength) {
    return String(num).padStart(totalLength, '0');
  }

  function numeroComas(num) {
      const numCalc = num ? Number(num).toFixed(0) : '0';
      return '$' + numCalc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }
</script>
<script src="/assets/js/table-cotizacion.js?v=1.0.0"></script>
@vite('resources/js/pdf/main.js')
@endsection
