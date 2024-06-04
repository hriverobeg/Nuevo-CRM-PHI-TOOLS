@props(['titulo', 'noForm' => false, 'clickAdd' => null])
<div x-data="list">

  <x-modaldelete />

  @if (!$noForm)
    <x-modalform>
      {{ $slot }}
    </x-modalform>
  @else
    {{ $slot }}
  @endif

  @if($errors->any())
  <div class="panel mb-5 flex items-center overflow-x-auto whitespace-nowrap p-3 text-danger">
    <div class="rounded-full bg-danger p-1.5 text-white ring-2 ring-danger/30 ltr:mr-3 rtl:ml-3">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
            <path d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z" stroke="currentColor" stroke-width="1.5"></path>
            <path opacity="0.5" d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
        </svg>
    </div>
    <span class="ltr:mr-3 rtl:ml-3">{{$errors->first()}}</a>
  </div>
  @endif

  @if ($clickAdd !== null)
    <x-buttonadd href="{{ $clickAdd }}">Agregar</x-buttonadd>
  @else
    <x-buttonadd @click="onForm()">Agregar</x-buttonadd>
  @endif

  <div x-data="striped">
    <div class="panel">
      <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">{{ $titulo }}</h5>
      <table id="tableStripe" class="table-striped whitespace-nowrap"></table>
    </div>
  </div>
</div>
