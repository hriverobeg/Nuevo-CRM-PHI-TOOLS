@props(['nombre', 'value', 'bg' => 'primary'])
<div class="max-w-[20rem] w-full bg-{{ $bg }} shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-0 dark:bg-primary-dark-light dark:shadow-none p-5">
    <div class="text-center font-semibold">
        <h5 class="text-white text-xl font-bold mb-5 dark:text-white-light">{{$nombre}}</h5>
        <p class="text-white text-5xl mb-5">{{$value}}</p>
    </div>
</div>
