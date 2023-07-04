import React from 'react';
import Table from '../components/Table';
import { getResiduo, numeroComas, pagoRenta } from '../utils/formulas';

const TablePagoInicial = ({
  anticipo,
  comisionPorApertura,
  interes,
  valorActivo,
  tipoActivo,
  is24,
  is36,
  is48,
  is60,
  ...form
}) => {
  const anticipoEnd = anticipo ?? 0;
  const pagoRenta24 = pagoRenta(interes, 24, anticipoEnd, valorActivo, getResiduo(24, form));
  const pagoRenta36 = pagoRenta(interes, 36, anticipoEnd, valorActivo, getResiduo(36, form));
  const pagoRenta48 = pagoRenta(interes, 48, anticipoEnd, valorActivo, getResiduo(48, form));
  const pagoRenta60 = pagoRenta(interes, 60, anticipoEnd, valorActivo, getResiduo(60, form));

  return (
    <Table titulo='Pago inicial'>
      <thead>
        <th className='text-left'>Concepto</th>
        {is24 && <th>24 meses</th>}
        {is36 && <th>36 meses</th>}
        {is48 && <th>48 meses</th>}
        {is60 && <th>60 meses</th>}
      </thead>
      <tbody>
        <tr>
          <td>Anticipo</td>
          {is24 && <td id='anticipo24'>{numeroComas(anticipoEnd)}</td>}
          {is36 && <td id='anticipo36'>{numeroComas(anticipoEnd)}</td>}
          {is48 && <td id='anticipo48'>{numeroComas(anticipoEnd)}</td>}
          {is60 && <td id='anticipo60'>{numeroComas(anticipoEnd)}</td>}
        </tr>
        <tr>
          <td>Comisión por apertura</td>
          {is24 && <td id='cxa24'>{numeroComas(comisionPorApertura)}</td>}
          {is36 && <td id='cxa36'>{numeroComas(comisionPorApertura)}</td>}
          {is48 && <td id='cxa48'>{numeroComas(comisionPorApertura)}</td>}
          {is60 && <td id='cxa60'>{numeroComas(comisionPorApertura)}</td>}
        </tr>
        <tr>
          <td>Renta en depósito</td>
          {is24 && <td>{numeroComas(pagoRenta24)}</td>}
          {is36 && <td>{numeroComas(pagoRenta36)}</td>}
          {is48 && <td>{numeroComas(pagoRenta48)}</td>}
          {is60 && <td>{numeroComas(pagoRenta60)}</td>}
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Total</th>
          {is24 && (
            <th id='pitot24'>{numeroComas(anticipoEnd + comisionPorApertura + pagoRenta24)}</th>
          )}
          {is36 && (
            <th id='pitot36'>{numeroComas(anticipoEnd + comisionPorApertura + pagoRenta36)}</th>
          )}
          {is48 && (
            <th id='pitot48'>{numeroComas(anticipoEnd + comisionPorApertura + pagoRenta48)}</th>
          )}
          {is60 && (
            <th id='pitot60'>{numeroComas(anticipoEnd + comisionPorApertura + pagoRenta60)}</th>
          )}
        </tr>
      </tfoot>
    </Table>
  );
};

export default TablePagoInicial;
