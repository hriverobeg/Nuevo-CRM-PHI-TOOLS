document.addEventListener('alpine:init', () => {
  Alpine.data('cotizaciones', () => ({
    boards: boardsLaravel ?? []
  }))
})