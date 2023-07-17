@props(['titulo', 'value' => ''])
<div class="mb-4 flex w-full items-center justify-between" >
    <div class="text-white-dark">{{ $titulo }}:</div>
    <p>{{$value}}</p>
   {{$slot}}
</div>
