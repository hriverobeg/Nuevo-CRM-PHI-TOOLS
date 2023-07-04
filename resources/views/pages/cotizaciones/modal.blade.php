<div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60 px-4" :class="isModal && '!block'">
  <div class="flex min-h-screen items-center justify-center">
    <div
        x-show="isModal"
        x-transition
        x-transition.duration.300
        @click.outside="isModal = false"
        class="panel my-8 w-[90%] overflow-hidden rounded-lg border-0 p-0"
    >
      <button
        type="button"
        class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
        @click="isModal = false"
      >
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
      <div
        class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
      >Cotización</div>
      <div class="p-5">
        <div id="cotizacion"></div>
      </div>
    </div>
  </div>
</div>