import React from 'react'

const Table = ({
  titulo = '',
  children
}) => {
  return (
    <>
      <h2 className='text-lg font-semibold dark:text-white-light mb-3'>{titulo}</h2>
      <div className='table-responsive'>
        <table className='table-hover'>{children}</table>
      </div>
    </>
  )
}

export default Table