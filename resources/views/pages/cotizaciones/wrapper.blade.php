@extends('layouts.main')
@section('content')
<div x-data="cotizaciones">
  <div class="flex">
    <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary">
      <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24px"
          height="24px"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="h-5 w-5 ltr:mr-3 rtl:ml-3"
      >
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
      </svg>
        Agregar cotización
    </a>
  </div>

  <!-- cotizacion list -->
  <div class="relative pt-5">
    <div class="perfect-scrollbar -mx-2 h-full">
      <div class="flex flex-nowrap items-start gap-5 overflow-x-auto px-2 pb-2">
        <template x-for="board in boards" :key="board.id">
          <div class="panel w-80 flex-none">
            <div class="mb-5 flex justify-between">
              <h4 x-text="board.nombre" class="text-base font-semibold"></h4>
            </div>
          </div>
        </template>
      </div>
    </div>
  </div>

</div>
@endsection
@section('scripts')
<script>
  var boardsLaravel = @json($boards);
</script>
<script src="/assets/js/cotizaciones.js"></script>
@endsection