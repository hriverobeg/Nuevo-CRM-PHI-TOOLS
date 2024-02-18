const disabledBoard = (nivelId, isAdmin) => {
  if (isAdmin) return false;

  if (nivelId === 1 && !isAdmin) {
    return false;
  }

  if (nivelId === 2 && !isAdmin) {
    return false;
  }

  return true;
};

document.addEventListener('alpine:init', () => {
  Alpine.data('cotizaciones', () => ({
    init() {
      this.initializeSortable();
    },
    boards: boardsLaravel ?? [],
    isModalCotizacion: false,
    row: null,
    buscar: '',
    isLoadingPdf: false,
    isLoadingGrupoPdf: false,
    isDeleteModal: false,
    async downloadPdf(grupo = false) {


      if (grupo) {
        this.isLoadingGrupoPdf = true
        const cotizaciones = this.boards
            .find(f => f.id === this.row?.board_id)
            .cotizaciones.filter(f => f.grupo === this.row?.grupo)

        await window.createPDF(cotizaciones, {
            nombre: this.row?.usuario?.nombre ?? this.row?.cliente?.nombre,
            empresa: this.row?.usuario ? '' : this.row?.cliente?.empresa,
        });
        this.isLoadingGrupoPdf = false
      } else {
        this.isLoadingPdf = true;
        await window.createPDF(this.row, {
            nombre: this.row?.usuario?.nombre ?? this.row?.cliente?.nombre,
            empresa: this.row?.usuario ? '' : this.row?.cliente?.empresa,
          });
          this.isLoadingPdf = false;
      }



    },
    onView(cotizacion) {
      if (cotizacion) {
        console.log('hola', cotizacion.tipoActivo);
        this.row = cotizacion;
        this.isModalCotizacion = true;
      }
    },
    onDelete(row) {
      this.row = row;
      this.rowArray = []
      this.isDeleteModal = true;
    },
    titulo(row) {
        console.log({ row: row?.tipoActivo })
      const cliente = row?.cliente?.nombre ?? row?.admin?.nombre;
      return `AP-${this.padWithLeadingZeros(row?.id, 5)}-${cliente}`;
    },
    padWithLeadingZeros(num, totalLength) {
      return String(num).padStart(totalLength, '0');
    },
    numeroComas(num) {
      const numCalc = num ? Number(num).toFixed(0) : '0';
      return '$' + numCalc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    },
    get filteredData() {
      if (this.buscar === '') {
        return this.boards;
      }

      return this.boards.map((b) => ({
        ...b,
        cotizaciones: b.cotizaciones.filter((c) => {
            return this.titulo(c)
            .replace(/ /g, '')
            .toLowerCase()
            .includes(this.buscar.replace(/ /g, '').toLowerCase())
        }),
      }));
    },
    initializeSortable() {
      setTimeout(() => {
        //sortable js

        this.boards.forEach((board) => {
          Sortable.create(document.querySelector(`#board-${board.id}`), {
            animation: 200,
            group: 'name',
            ghostClass: 'sortable-ghost',
            dragClass: 'sortable-drag',
            disabled: disabledBoard(Number(board.id), isAdmin),
            onEnd: ({ from, to, item }) => {
              const cotizacionId = item.getAttribute('data-id');
              const fromId = from.getAttribute('data-id');
              const toId = to.getAttribute('data-id');

              const token = document.querySelector('meta[name="csrf-token"]').content;

              fetch(`/api/cotizacion/${cotizacionId}`, {
                headers: {
                  Accept: 'application/json',
                  'Content-Type': 'application/json',
                },
                method: 'PUT',
                body: JSON.stringify({ board_id: toId, _token: token }),
              })
                .then((r) => r.json())
                .then(() => {})
                .catch((e) => console.log(e));
            },
          });
        });
      });
    },
  }));
});

