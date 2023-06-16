@extends('layouts.main')
@section('content')
<div x-data="striped">
  <div class="panel">
      <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">Administradores</h5>
      <table id="tableStripe" class="table-striped"></table>
  </div>
</div>
@endsection
@section('scripts')
<script>
  var data = @json($list);
  document.addEventListener('alpine:init', () => {
    Alpine.data('striped', () => ({
      init() {
        const tableOptions = {
            data: {
                headings: ['ID', 'Nombre', 'Email'],
                data: data.map(m => ([m.id, m.nombre, m.email])),
            },
            sortable: false,
            searchable: true,
            perPage: 10,
            perPageSelect: [10, 20, 30, 50, 100],
            firstLast: true,
            firstText:
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
            lastText:
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
            prevText:
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
            nextText:
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
            labels: {
                perPage: '{select}',
            },
            layout: {
                top: '{search}',
                bottom: '{info}{select}{pager}',
            },
        };

        const datatable1 = new simpleDatatables.DataTable('#tableStripe', tableOptions);
      },
    }));
  })
  </script>
@endsection