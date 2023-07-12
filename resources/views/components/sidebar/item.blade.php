<li class="nav-item">
  <a href="{{ $href }}" class="group">
      <div class="flex items-center">
        {{ $slot }}
          <span
              class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">{{ $nombre }}</span>
      </div>
  </a>
</li>