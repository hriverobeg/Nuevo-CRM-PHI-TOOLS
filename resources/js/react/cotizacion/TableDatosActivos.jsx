import React from 'react';
import { numeroComas } from '../../utils/formulas';
import Table from '../components/Table';

const TableDatosActivos = ({ nombreActivo, anio, valorActivo }) => {
  return (
    <Table titulo='Datos del activo'>
      <tbody>
        <tr>
          <td>Datos del activo</td>
          <td className='text-right'>{nombreActivo}</td>
        </tr>
        <tr>
          <td>Año</td>
          <td className='text-right'>{anio}</td>
        </tr>
        <tr>
          <td>Valor del activo</td>
          <td className='text-right'>{numeroComas(valorActivo)}</td>
        </tr>
      </tbody>
    </Table>
  );
};

export default TableDatosActivos;
