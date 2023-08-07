import React from 'react';
import Table from '../components/Table';
import { getResiduo, numeroComas, pagoRenta } from '../../utils/formulas';

const TablePagoOc = ({
  anticipo,
  valorSeguro,
  interes,
  valorActivo,
  tipoActivo,
  is24,
  is36,
  is48,
  is60,
  ...form
}) => {
  const pagoRenta24 = pagoRenta(interes, 24, anticipo, valorActivo, getResiduo(24, form));
  const pagoRenta36 = pagoRenta(interes, 36, anticipo, valorActivo, getResiduo(36, form));
  const pagoRenta48 = pagoRenta(interes, 48, anticipo, valorActivo, getResiduo(48, form));
  const pagoRenta60 = pagoRenta(interes, 60, anticipo, valorActivo, getResiduo(60, form));

  const vR24 = Number(valorActivo * getResiduo(24, form)).toFixed(2);
  const vR36 = Number(valorActivo * getResiduo(36, form)).toFixed(2);
  const vR48 = Number(valorActivo * getResiduo(48, form)).toFixed(2);
  const vR60 = Number(valorActivo * getResiduo(60, form)).toFixed(2);
  return (
    <Table titulo='Opción a compra'>
      <thead>
        <tr>
          <th>Concepto</th>
          {is24 && <th>24 meses</th>}
          {is36 && <th>36 meses</th>}
          {is48 && <th>48 meses</th>}
          {is60 && <th>60 meses</th>}
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Valor residual</td>
          {is24 && <td id='vr24'>{numeroComas(vR24)}</td>}
          {is36 && <td id='vr36'>{numeroComas(vR36)}</td>}
          {is48 && <td id='vr48'>{numeroComas(vR48)}</td>}
          {is60 && <td id='vr60'>{numeroComas(vR60)}</td>}
        </tr>
        <tr>
          <td>(Renta en depósito)</td>
          {is24 && <td id='renta24_r'>{numeroComas(pagoRenta24)}</td>}
          {is36 && <td id='renta36_r'>{numeroComas(pagoRenta36)}</td>}
          {is48 && <td id='renta48_r'>{numeroComas(pagoRenta48)}</td>}
          {is60 && <td id='renta60_r'>{numeroComas(pagoRenta60)}</td>}
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Total</th>
          {is24 && <th id='octot24'>{numeroComas(vR24 - pagoRenta24)}</th>}
          {is36 && <th id='octot36'>{numeroComas(vR36 - pagoRenta36)}</th>}
          {is48 && <th id='octot48'>{numeroComas(vR48 - pagoRenta48)}</th>}
          {is60 && <th id='octot60'>{numeroComas(vR60 - pagoRenta60)}</th>}
        </tr>
      </tfoot>
    </Table>
  );
};

export default TablePagoOc;
