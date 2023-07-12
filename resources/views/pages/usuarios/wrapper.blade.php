@extends('layouts.main')
@section('content')
<x-table titulo="Usuarios">
  @include('pages.usuarios.form')
</x-table>
@endsection
@section('scripts')
<script>
  var dataLaravel = @json($list);
  var headings = ['ID', 'Nombre', 'Email', 'Teléfono', 'Acciones']
  var data = dataLaravel.map(m => ([m.id, m.nombre, m.email, m.telefono, m.id]))
  var page = '/usuarios'

  var formData = {
    id: null,
    nombre: '',
    email: '',
    password: '',
    telefono: ''
  }
</script>
<script src="/assets/js/table.js"></script>
@endsection