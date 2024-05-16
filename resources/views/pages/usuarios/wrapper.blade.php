@extends('layouts.main')
@section('content')
<x-table titulo="Vendedores externos">
    @permiso('crear-cuenta-v-externo')
    @include('pages.usuarios.form')
    @endpermiso
</x-table>
@endsection
@section('scripts')
<script>
  var dataLaravel = @json($list);
  var headings = ['ID', 'Nombre', 'Email', 'Teléfono', 'Empresa', 'Interés', 'Comisión por apertura', 'Acciones']
  var data = dataLaravel.map(m => ([m.id, m.nombre, m.email, m.telefono, m.empresa,`${m.interes}%`, `${m.comisionPorcentaje}%`, m.id]))
  var page = '/vendedor-externo'

  var formData = {
    id: null,
    nombre: '',
    email: '',
    telefono: '',
    empresa: ''
  }
</script>
<script src="/assets/js/table.js"></script>
@endsection
