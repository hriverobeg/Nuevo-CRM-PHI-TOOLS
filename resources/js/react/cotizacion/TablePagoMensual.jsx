import React from 'react';
import Table from '../components/Table';
import { getResiduo, numeroComas, pagoRenta, pagoSeguro } from '../utils/formulas';

const TablePagoMensual = ({
  anticipo,
  valorSeguro,
  interes,
  valorActivo,
  tipoActivo,
  isTelematics,
  isSeguro,
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

  const pagoSeguroMensual = isSeguro ? pagoSeguro(interes, valorSeguro) : 0;
  return (
    <Table titulo='Pagos mensuales'>
      <thead>
        <th>Concepto</th>
        {is24 && <th>24 meses</th>}
        {is36 && <th>36 meses</th>}
        {is48 && <th>48 meses</th>}
        {is60 && <th>60 meses</th>}
      </thead>
      <tbody>
        <tr>
          <td>Renta</td>
          {is24 && <td id='renta24_'>{numeroComas(pagoRenta24)}</td>}
          {is36 && <td id='renta36_'>{numeroComas(pagoRenta36)}</td>}
          {is48 && <td id='renta48_'>{numeroComas(pagoRenta48)}</td>}
          {is60 && <td id='renta60_'>{numeroComas(pagoRenta60)}</td>}
        </tr>
        {isSeguro && (
          <tr>
            <td>Seguro</td>
            {is24 && <td id='seguro24'>{numeroComas(pagoSeguroMensual)}</td>}
            {is36 && <td id='seguro36'>{numeroComas(pagoSeguroMensual)}</td>}
            {is48 && <td id='seguro48'>{numeroComas(pagoSeguroMensual)}</td>}
            {is60 && <td id='seguro60'>{numeroComas(pagoSeguroMensual)}</td>}
          </tr>
        )}

        {isTelematics && (
          <tr>
            <td>Telematics</td>
            {is24 && <td id='telematics24'>$483</td>}
            {is36 && <td id='telematics36'>$491</td>}
            {is48 && <td id='telematics48'>$517</td>}
            {is60 && <td id='telematics60'>$522</td>}
          </tr>
        )}
      </tbody>
      <tfoot>
        <tr>
          <th>Total</th>
          {is24 && (
            <th id='pmtot24'>
              {numeroComas(pagoRenta24 + pagoSeguroMensual + (isTelematics ? 483 : 0))}
            </th>
          )}
          {is36 && (
            <th id='pmtot36'>
              {numeroComas(pagoRenta36 + pagoSeguroMensual + (isTelematics ? 491 : 0))}
            </th>
          )}
          {is48 && (
            <th id='pmtot48'>
              {numeroComas(pagoRenta48 + pagoSeguroMensual + (isTelematics ? 517 : 0))}
            </th>
          )}
          {is60 && (
            <th id='pmtot60'>
              {numeroComas(pagoRenta60 + pagoSeguroMensual + (isTelematics ? 522 : 0))}
            </th>
          )}
        </tr>
      </tfoot>
    </Table>
  );
};

export default TablePagoMensual;
