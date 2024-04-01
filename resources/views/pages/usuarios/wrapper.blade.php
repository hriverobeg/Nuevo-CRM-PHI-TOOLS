@extends('layouts.main')
@section('content')
<x-table titulo="Usuarios">
  @include('pages.usuarios.form')
</x-table>
@endsection
@section('scripts')
<script>
  var dataLaravel = @json($list);
  var headings = ['ID', 'Nombre', 'Email', 'Teléfono', 'Empresa', 'Interés', 'Comisión por apertura', 'Acciones']
  var data = dataLaravel.map(m => ([m.id, m.nombre, m.email, m.telefono, m.empresa,`${m.interes}%`, `${m.comisionPorcentaje}%`, m.id]))
  var page = '/usuarios'

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
