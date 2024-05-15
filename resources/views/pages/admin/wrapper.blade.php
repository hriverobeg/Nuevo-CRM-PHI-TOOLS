@extends('layouts.main')
@section('content')
<x-table titulo="Administradores">
    @permiso('crear-cuenta-admin')
    @include('pages.admin.form')
    @endpermiso
</x-table>
@endsection
@section('scripts')
<script>
  var dataLaravel = @json($list);
  var headings = ['ID', 'Nombre', 'Email', 'Acciones']
  var data = dataLaravel.map(m => ([m.id, m.nombre, m.email, m.id]))
  var page = '/admin'

  var formData = {
    id: null,
    nombre: '',
    email: '',
    password: ''
  }
</script>
<script src="/assets/js/table.js"></script>
@endsection
