const disabledBoard = (nivelId, isAdmin) => {
  if (isAdmin) return false

  if (nivelId === 1 && isAdmin) {
    return false
  }

  if (nivelId === 2 && !isAdmin) {
    return false
  }

  return true
}
document.addEventListener('alpine:init', () => {
  Alpine.data('cotizaciones', () => ({
    init() {
      this.initializeSortable()
    },
    boards: boardsLaravel ?? [],
    initializeSortable() {
      setTimeout(() => {
        //sortable js
        this.boards.forEach(board => {
          console.log(disabledBoard(board.nivel_id, isAdmin))
          Sortable.create(document.querySelector(`#board-${board.id}`), {
            animation: 200,
            group: 'name',
            ghostClass: 'sortable-ghost',
            dragClass: 'sortable-drag',
            disabled: disabledBoard(board.nivel_id, isAdmin),
            onEnd: ({ from, to, item }) => {
              const cotizacionId = item.getAttribute('data-id')
              const fromId = from.getAttribute('data-id')
              const toId = to.getAttribute('data-id')
              
              if (toId > fromId) {
                fetch( `/api/cotizacion/${cotizacionId}`, {
                  headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                  },
                  method: 'PUT',
                  data: { board_id: 1 }
                }).then(r => r.json())
                .then(() => {

                })
                .catch(e => console.log(e))
              }
            }
          });
        });
      });
    },
  }));
});
