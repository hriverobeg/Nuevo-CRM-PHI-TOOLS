<div :class="{ 'dark text-white-dark': $store.app.semidark }">
  <nav x-data="sidebar"
      class="sidebar fixed top-0 bottom-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
    <div class="h-full bg-white dark:bg-[#0e1726]">
      <div class="flex items-center justify-between px-4 py-3">
          <a href="/" class="main-logo flex shrink-0 items-center">
              <img class="ml-[5px] w-[95px] flex-none" src="/assets/images/logo.jpg" alt="image" />
          </a>
          <a href="javascript:;"
              class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
              @click="$store.app.toggleSidebar()">
              <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" />
                  <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
          </a>
      </div>
      <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
          x-data="{ activeDropdown: 'datatables' }">

          <li class="nav-item">
            <ul>
                <li class="nav-item">
                    @php
                        $url = auth()->user()->nivel_id === 1 ? '/dashboard-admin' : '/dashboard-cliente'
                    @endphp
                    <a href="{{ $url }}" class="group">
                        <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" stroke="#1C274C" stroke-width="1.5"/>
                                <path d="M15 18H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <span
                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                        </div>
                    </a>
                </li>
            </ul>
          </li>

          <h2
              class="-mx-4 mb-1 flex items-center bg-white-light/30 py-3 px-7 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
              <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                  fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
              </svg>
              <span>Apps</span>
          </h2>

          <li class="nav-item">
              <ul>
                @if (auth()->user()->nivel_id == 1)
                <x-sidebar.item href="/admin" nombre="Administradores">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="#1C274C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C9.96067 12.25 8.07752 12.7208 6.67815 13.5204C5.3 14.3079 4.25 15.5101 4.25 17C4.25 18.4899 5.3 19.6921 6.67815 20.4796C8.07752 21.2792 9.96067 21.75 12 21.75C14.0393 21.75 15.9225 21.2792 17.3219 20.4796C18.7 19.6921 19.75 18.4899 19.75 17C19.75 15.5101 18.7 14.3079 17.3219 13.5204C15.9225 12.7208 14.0393 12.25 12 12.25ZM5.75 17C5.75 16.2807 6.26701 15.483 7.42236 14.8228C8.55649 14.1747 10.1733 13.75 12 13.75C13.8267 13.75 15.4435 14.1747 16.5776 14.8228C17.733 15.483 18.25 16.2807 18.25 17C18.25 17.7193 17.733 18.517 16.5776 19.1772C15.4435 19.8253 13.8267 20.25 12 20.25C10.1733 20.25 8.55649 19.8253 7.42236 19.1772C6.26701 18.517 5.75 17.7193 5.75 17Z" fill="#1C274C"/>
                    </svg>
                </x-sidebar.item>
                @endif

                  @if (auth()->user()->nivel_id == 1)
                  <x-sidebar.item href="/vendedor-externo" nombre="Vendedores externos">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25013 6C5.25013 3.37665 7.37678 1.25 10.0001 1.25C12.6235 1.25 14.7501 3.37665 14.7501 6C14.7501 8.62335 12.6235 10.75 10.0001 10.75C7.37678 10.75 5.25013 8.62335 5.25013 6ZM10.0001 2.75C8.20521 2.75 6.75013 4.20507 6.75013 6C6.75013 7.79493 8.20521 9.25 10.0001 9.25C11.7951 9.25 13.2501 7.79493 13.2501 6C13.2501 4.20507 11.7951 2.75 10.0001 2.75Z" fill="#1C274C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.97558 13.6643C5.55506 12.7759 7.68658 12.25 10.0001 12.25C12.3137 12.25 14.4452 12.7759 16.0247 13.6643C17.5807 14.5396 18.7501 15.8661 18.7501 17.5L18.7502 17.602C18.7513 18.7638 18.7527 20.222 17.4737 21.2635C16.8443 21.7761 15.9637 22.1406 14.7739 22.3815C13.5809 22.6229 12.0259 22.75 10.0001 22.75C7.97436 22.75 6.4194 22.6229 5.22634 22.3815C4.03661 22.1406 3.15602 21.7761 2.52655 21.2635C1.24752 20.222 1.24894 18.7638 1.25007 17.602L1.25013 17.5C1.25013 15.8661 2.41962 14.5396 3.97558 13.6643ZM4.71098 14.9717C3.37151 15.7251 2.75013 16.6487 2.75013 17.5C2.75013 18.8078 2.79045 19.544 3.47372 20.1004C3.84425 20.4022 4.46366 20.6967 5.52393 20.9113C6.58087 21.1252 8.02591 21.25 10.0001 21.25C11.9744 21.25 13.4194 21.1252 14.4763 20.9113C15.5366 20.6967 16.156 20.4022 16.5265 20.1004C17.2098 19.544 17.2501 18.8078 17.2501 17.5C17.2501 16.6487 16.6288 15.7251 15.2893 14.9717C13.9733 14.2315 12.1049 13.75 10.0001 13.75C7.89541 13.75 6.02693 14.2315 4.71098 14.9717Z" fill="#1C274C"/>
                        <path d="M19.7501 8C19.7501 7.58579 19.4143 7.25 19.0001 7.25C18.5859 7.25 18.2501 7.58579 18.2501 8V9.25002H17.0001C16.5859 9.25002 16.2501 9.5858 16.2501 10C16.2501 10.4142 16.5859 10.75 17.0001 10.75H18.2501V12C18.2501 12.4142 18.5859 12.75 19.0001 12.75C19.4143 12.75 19.7501 12.4142 19.7501 12V10.75H21.0001C21.4143 10.75 21.7501 10.4142 21.7501 10C21.7501 9.5858 21.4143 9.25002 21.0001 9.25002H19.7501V8Z" fill="#1C274C"/>
                    </svg>
                  </x-sidebar.item>
                  @endif
                  @if (auth()->user()->nivel_id == 1)
                  <x-sidebar.item href="/vendedor-interno" nombre="Vendedores internos">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25013 6C6.25013 3.37665 8.37678 1.25 11.0001 1.25C13.6235 1.25 15.7501 3.37665 15.7501 6C15.7501 8.62335 13.6235 10.75 11.0001 10.75C8.37678 10.75 6.25013 8.62335 6.25013 6ZM11.0001 2.75C9.20521 2.75 7.75013 4.20507 7.75013 6C7.75013 7.79493 9.20521 9.25 11.0001 9.25C12.7951 9.25 14.2501 7.79493 14.2501 6C14.2501 4.20507 12.7951 2.75 11.0001 2.75Z" fill="#1C274C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.97558 13.6643C6.55506 12.7759 8.68658 12.25 11.0001 12.25C13.3137 12.25 15.4452 12.7759 17.0247 13.6643C18.5807 14.5396 19.7501 15.8661 19.7501 17.5L19.7502 17.602C19.7513 18.7638 19.7527 20.222 18.4737 21.2635C17.8443 21.7761 16.9637 22.1406 15.7739 22.3815C14.5809 22.6229 13.0259 22.75 11.0001 22.75C8.97436 22.75 7.4194 22.6229 6.22634 22.3815C5.03661 22.1406 4.15602 21.7761 3.52655 21.2635C2.24752 20.222 2.24894 18.7638 2.25007 17.602L2.25013 17.5C2.25013 15.8661 3.41962 14.5396 4.97558 13.6643ZM5.71098 14.9717C4.37151 15.7251 3.75013 16.6487 3.75013 17.5C3.75013 18.8078 3.79045 19.544 4.47372 20.1004C4.84425 20.4022 5.46366 20.6967 6.52393 20.9113C7.58087 21.1252 9.02591 21.25 11.0001 21.25C12.9744 21.25 14.4194 21.1252 15.4763 20.9113C16.5366 20.6967 17.156 20.4022 17.5265 20.1004C18.2098 19.544 18.2501 18.8078 18.2501 17.5C18.2501 16.6487 17.6288 15.7251 16.2893 14.9717C14.9733 14.2315 13.1049 13.75 11.0001 13.75C8.89541 13.75 7.02693 14.2315 5.71098 14.9717Z" fill="#1C274C"/>
                        <path d="M21.5607 8.99827C21.8359 8.68869 21.808 8.21463 21.4984 7.93944C21.1888 7.66425 20.7148 7.69214 20.4396 8.00173L18.2743 10.4377L17.5019 9.74253C17.194 9.46544 16.7198 9.49039 16.4427 9.79828C16.1656 10.1062 16.1905 10.5804 16.4984 10.8575L17.8317 12.0575C17.9802 12.1911 18.1758 12.26 18.3752 12.2488C18.5746 12.2377 18.7613 12.1475 18.894 11.9983L21.5607 8.99827Z" fill="#1C274C"/>
                    </svg>
                  </x-sidebar.item>
                  @endif
                  <x-sidebar.item href="/cotizaciones" nombre="Cotizaciones">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.5" cx="12" cy="12" r="10" stroke="#1C274C" stroke-width="1.5"/>
                        <path d="M12 6V18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                  </x-sidebar.item>
                  <x-sidebar.item href="/clientes" nombre="Clientes">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25013 6C5.25013 3.37665 7.37678 1.25 10.0001 1.25C12.6235 1.25 14.7501 3.37665 14.7501 6C14.7501 8.62335 12.6235 10.75 10.0001 10.75C7.37678 10.75 5.25013 8.62335 5.25013 6ZM10.0001 2.75C8.20521 2.75 6.75013 4.20507 6.75013 6C6.75013 7.79493 8.20521 9.25 10.0001 9.25C11.7951 9.25 13.2501 7.79493 13.2501 6C13.2501 4.20507 11.7951 2.75 10.0001 2.75Z" fill="#1C274C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.97558 13.6643C5.55506 12.7759 7.68658 12.25 10.0001 12.25C12.3137 12.25 14.4452 12.7759 16.0247 13.6643C17.5807 14.5396 18.7501 15.8661 18.7501 17.5L18.7502 17.602C18.7513 18.7638 18.7527 20.222 17.4737 21.2635C16.8443 21.7761 15.9637 22.1406 14.7739 22.3815C13.5809 22.6229 12.0259 22.75 10.0001 22.75C7.97436 22.75 6.4194 22.6229 5.22634 22.3815C4.03661 22.1406 3.15602 21.7761 2.52655 21.2635C1.24752 20.222 1.24894 18.7638 1.25007 17.602L1.25013 17.5C1.25013 15.8661 2.41962 14.5396 3.97558 13.6643ZM4.71098 14.9717C3.37151 15.7251 2.75013 16.6487 2.75013 17.5C2.75013 18.8078 2.79045 19.544 3.47372 20.1004C3.84425 20.4022 4.46366 20.6967 5.52393 20.9113C6.58087 21.1252 8.02591 21.25 10.0001 21.25C11.9744 21.25 13.4194 21.1252 14.4763 20.9113C15.5366 20.6967 16.156 20.4022 16.5265 20.1004C17.2098 19.544 17.2501 18.8078 17.2501 17.5C17.2501 16.6487 16.6288 15.7251 15.2893 14.9717C13.9733 14.2315 12.1049 13.75 10.0001 13.75C7.89541 13.75 6.02693 14.2315 4.71098 14.9717Z" fill="#1C274C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.7501 9.69672C22.7501 8.59954 22.1877 7.70123 21.2545 7.37409C20.5252 7.11843 19.7164 7.26275 19.0001 7.73431C18.2838 7.26275 17.4751 7.11843 16.7458 7.3741C15.8126 7.70123 15.2501 8.59955 15.2501 9.69673C15.2501 10.4666 15.6913 11.1479 16.125 11.6493C16.5783 12.1735 17.1393 12.6327 17.5993 12.9703L17.6698 13.0223C18.0211 13.282 18.4208 13.5776 19.0001 13.5776C19.5794 13.5776 19.9792 13.282 20.3305 13.0223L20.401 12.9703C20.861 12.6327 21.4219 12.1735 21.8752 11.6493C22.3089 11.1479 22.7501 10.4666 22.7501 9.69672ZM19.5188 9.23307C20.0444 8.72986 20.508 8.70189 20.7583 8.78964C20.9876 8.87002 21.2501 9.12068 21.2501 9.69672C21.2501 9.91131 21.1089 10.2424 20.7407 10.6681C20.392 11.0713 19.9316 11.4542 19.5136 11.7609C19.2874 11.9269 19.18 12.0034 19.094 12.0488C19.0396 12.0775 19.0246 12.0776 19.0001 12.0776C18.9757 12.0776 18.9606 12.0775 18.9062 12.0488C18.8203 12.0034 18.7129 11.9269 18.4867 11.7609C18.0687 11.4542 17.6082 11.0712 17.2596 10.6681C16.8914 10.2423 16.7501 9.91131 16.7501 9.69673C16.7501 9.12068 17.0127 8.87002 17.242 8.78964C17.4923 8.70189 17.9559 8.72986 18.4814 9.23307C18.7715 9.51077 19.2288 9.51077 19.5188 9.23307Z" fill="#1C274C"/>
                    </svg>
                  </x-sidebar.item>
                  <x-sidebar.item href="/notificaciones" nombre="Notificaciones">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z" stroke="#1C274C" stroke-width="1.5"/>
                        <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                  </x-sidebar.item>
              </ul>
          </li>
      </ul>
    </div>
  </nav>
</div>
