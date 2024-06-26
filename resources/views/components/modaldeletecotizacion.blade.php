<div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="isDeleteModal && '!block'">
    <div class="flex min-h-screen items-center justify-center px-4" @click.self="isDeleteModal = false">
        <div
            x-show="isDeleteModal"
            x-transition
            x-transition.duration.300
            class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full"
        >
            <button type="button" class="absolute top-4 text-white-dark ltr:right-4 rtl:left-4" @click="isDeleteModal = false">
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
                    class="h-6 w-6"
                >
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]">
                Eliminar
            </div>
            <div class="p-5 text-center">
                <div class="mx-auto w-fit rounded-full bg-danger p-4 text-white ring-4 ring-danger/30">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                        <path
                            opacity="0.5"
                            d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                        ></path>
                        <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path
                            d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                        ></path>
                        <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                </div>
                <div class="mx-auto mt-5 text-base sm:w-3/4">¿Estás seguro que deseas eliminar?</div>

                <form method="POST" :action="`/cotizaciones/${row?.id}`">
                  @csrf
                  <input type="hidden" name="_method" value="delete">
                  <div class="mt-8 flex items-center justify-center">
                    <button type="button" class="btn btn-outline-danger" @click="isDeleteModal = false">Cancelar</button>
                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Eliminar</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
