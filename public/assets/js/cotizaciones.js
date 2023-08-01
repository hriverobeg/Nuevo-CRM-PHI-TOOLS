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
    isLoadingPdf: false,
    isDeleteModal: false,
    async downloadPdf() {
      this.isLoadingPdf = true;
      await window.createPDF(this.row, {
        nombre: this.row?.usuario?.nombre ?? this.row?.cliente?.nombre,
        empresa: this.row?.usuario?.nombre ?? this.row?.cliente?.empresa,
      });
      this.isLoadingPdf = false;
    },
    onView(cotizacion) {
      if (cotizacion) {
        this.row = cotizacion;
        this.isModalCotizacion = true;
      }
    },
    onDelete(row) {
        this.row = row

        this.isDeleteModal = true
    },
    numeroComas(num) {
      const numCalc = num ? Number(num).toFixed(0) : '';
      return '$' + numCalc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
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
            disabled: disabledBoard(board.nivel_id, isAdmin),
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
