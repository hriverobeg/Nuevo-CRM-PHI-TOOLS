@props(['titulo'])
<div x-data="list">

  <x-modaldelete />
  
  <x-modalform>
    {{ $slot }}
  </x-modalform>
  
  <button type="button" class="btn btn-primary flex mb-5" @click="onForm()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 ltr:mr-3 rtl:ml-3">
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
    Agregar
  </button>

  <div x-data="striped">
    <div class="panel">
      <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">{{ $titulo }}</h5>    
      <table id="tableStripe" class="table-striped"></table>
    </div>
  </div>
</div>