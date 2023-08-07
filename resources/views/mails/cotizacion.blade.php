@extends('mails.layout')

@section('content')
  <x-mail.titulo>¡Hola {{ $nombre }}!</x-mail.titulo>
  <x-mail.texto>A continuación anexo propuesta de arrendamiento puro para tu revisión.</x-mail.texto>
  <x-mail.texto>Si tienes alguna pregunta o requieres algún ajuste en específico no dudes en contactarme, dejo mis datos en la portada.</x-mail.texto>
  <x-mail.texto>Mi objetivo es delimitar un plan que se ajuste a tu presupuesto.</x-mail.texto>
  <x-mail.texto>Por favor, revisa la cotización en el siguiente enlace:</x-mail.texto>
  <x-mail.button :href="config('app.url') . '/cotizacion-descargar?email=' .  urlencode($email) .'&id=' . $id">Descargar cotización</x-mail.button>
@endsection
