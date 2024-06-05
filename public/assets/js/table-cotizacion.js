const columnActions = (select = 4, isView = false) => ({
    select,
    sortable: false,
    render: (data, cell, row) => {
      return `<div class="flex items-center">
      ${
        isView
          ? `<a href="/clientes/${data}" class="ltr:mr-2 rtl:ml-2" x-tooltip="Detalle" >
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
              <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
              <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
          </svg>
          </a>`
          : ''
      }
              <button type="button" class="ltr:mr-2 rtl:ml-2" x-tooltip="Editar" @click="onForm(${data})">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
                      <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5" />
                      <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5" />
                  </svg>
              </button>
              <button type="button" x-tooltip="Eliminar" @click="onDelete(${data})">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                      <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                      <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                      <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                      <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                      <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                  </svg>
              </button>

          </div>`;
    },
  });

const columnDelete = (select = 4) => ({
    select,
    sortable: false,
    render: (data, cell, row) => {
        return `<div class="flex items-center">
        <button type="button" x-tooltip="Eliminar" @click="onDelete(${data})">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
            <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>
    </button>
        </div>`;
    }
})

const columnPDF = (select) => ({
    select,
    sortable: false,
    render: (data, cell, row) => {
        return `<div class="flex items-center">
            <button x-disabled="isLoadingPdf" class="btn btn-primary btn-sm" @click="downloadPdfTable(${data})">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                    <path opacity="0.5" d="M3 15C3 17.8284 3 19.2426 3.87868 20.1213C4.75736 21 6.17157 21 9 21H15C17.8284 21 19.2426 21 20.1213 20.1213C21 19.2426 21 17.8284 21 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 3V16M12 16L16 11.625M12 16L8 11.625" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                PDF
            </button>
        </div>
        `
    }
})

function getNumbersBeforeDash(str) {
  const match = str.match(/^(\d+)-/);
  return match ? match[1] : null;
}

const columnPDFGrupo = (select) => ({
    select,
    sortable: false,
    render: (data, cell, row) => {
        if (String(data).endsWith('null')) return null;
        const id = getNumbersBeforeDash(data)

        return `<div class="flex items-center">
            <button x-disabled="isLoadingPdf" class="btn btn-primary btn-sm" @click="downloadPdfTable(${id}, true)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                    <path opacity="0.5" d="M3 15C3 17.8284 3 19.2426 3.87868 20.1213C4.75736 21 6.17157 21 9 21H15C17.8284 21 19.2426 21 20.1213 20.1213C21 19.2426 21 17.8284 21 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 3V16M12 16L16 11.625M12 16L8 11.625" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                PDF
            </button>
        </div>
        `
    }
})

const columnDetails = (select = 4) => ({
    select,
    sortable: false,
    render: (data, cell, row) => {
        return `<div class="flex items-center">
                <button type="button" class="ltr:mr-2 rtl:ml-2" x-tooltip="Editar" @click="onViewCotizacion(${data})">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                    <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
            </button>
        </div>`;
    }
})

  document.addEventListener('alpine:init', () => {
    Alpine.data('striped', () => ({
      init() {
        const tableOptions = {
          data: {
            headings,
            data,
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
          columns: [
            columnDetails(headings.length - 4),
            columnDelete(headings.length - 3),
            columnPDF(headings.length - 2),
            columnPDFGrupo(headings.length - 1),
          ],
        };

        new simpleDatatables.DataTable('#tableStripe', tableOptions);
      },
    }));

    Alpine.data('list', () => ({
      isModalCotizacion: false,
      isDeleteModal: false,
      cotizacion: null,
      isLoadingPdf: false,
      isLoadingGrupoPdf: false,
      row: null,
      form: {},
      method: 'POST',
      cotizaciones: dataLaravel,
      onViewCotizacion(id) {
          this.isModalCotizacion = true;
          this.row = dataLaravel.find((f) => f.id === id);
      },
      async downloadPdf(grupo = false) {

        if (grupo) {
          this.isLoadingGrupoPdf = true
          const cotizaciones = this.cotizaciones.filter(f => f.grupo === this.row?.grupo)
          await window.createPDF(cotizaciones, {
              nombre: this.row?.to_user?.nombre,
              empresa: this.row?.to_user?.empresa ?? '',
          });
          this.isLoadingGrupoPdf = false
        } else {
          this.isLoadingPdf = true;
          await window.createPDF(this.row, {
              nombre: this.row?.to_user?.nombre,
              empresa: this.row?.to_user?.empresa ?? '',
            });
            this.isLoadingPdf = false;
        }
      },
      downloadPdfTable(id, grupo = false) {
        const row = dataLaravel.find((f) => f.id === id);
        this.row = row

        this.downloadPdf(grupo);
      },
      onDelete(id) {
        const row = dataLaravel.find((f) => f.id === id);
        this.row = row;

        this.isDeleteModal = true;
      },
      titulo(row) {
        const usuario = row?.from_user?.nombre;
        return `AP-${this.padWithLeadingZeros(row?.id, 5)}-${usuario}`;
     },
     padWithLeadingZeros(num, totalLength) {
        return String(num).padStart(totalLength, '0');
      },
      numeroComas(num) {
        const numCalc = num ? Number(num).toFixed(0) : '0';
        return '$' + numCalc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
      },
    }));
  });
