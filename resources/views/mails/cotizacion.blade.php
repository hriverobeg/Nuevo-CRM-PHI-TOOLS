@extends('mails.layout')

@section('content')
  <x-mail.titulo>¡Hola {{ $nombre }}!</x-mail.titulo>
  <x-mail.texto>Espero que te encuentres muy bien. Quería avisarte que tu cotización ya está lista y disponible para revisión.</x-mail.texto>
  <x-mail.texto>Si tienes alguna pregunta o requieres ajustes específicos, no dudes en hacérmelo saber. Estoy aquí para ayudarte en todo lo que necesites. Mi objetivo es brindarte un servicio de calidad y que te sientas satisfecho con nuestra propuesta.</x-mail.texto>
  <x-mail.texto>Por favor, revisa la cotización el enlace a continuación:</x-mail.texto>
  <x-mail.button :href="config('app.url') . '/cotizacion-descargar?email=' .  urlencode($email) .'&id=' . $id">Descargar cotización</x-mail.button>
@endsection
