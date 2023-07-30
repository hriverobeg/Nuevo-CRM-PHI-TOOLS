@extends('mails.layout')

@section('content')
  <x-mail.titulo>¡Hola {{ $cotizacion->usuario?->nombre ?? $cotizacion->cliente?->nombre }}!</x-mail.titulo>
  <x-mail.texto>La descarga será automatica, si no se ha descargado haga click en el siguiente enlace.</x-mail.texto>
  <x-mail.button href="javascript::void(0)" onclick="downloadPdf()">Descargar cotización</x-mail.button>

  @vite('resources/js/pdf/main.js')
    <script>
        var cotizacion = @json($cotizacion);

        async function downloadPdf () {

            await window.createPDF(cotizacion, {
                nombre: cotizacion?.usuario?.nombre ?? cotizacion?.cliente?.nombre,
                empresa: cotizacion?.usuario?.nombre ?? cotizacion?.cliente?.empresa,
            });
        }

        window.onload = function () {
            downloadPdf()
        }
    </script>
@endsection
