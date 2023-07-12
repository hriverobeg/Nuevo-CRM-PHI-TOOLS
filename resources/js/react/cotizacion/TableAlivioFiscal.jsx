import React from 'react';
import Table from '../components/Table';
import { getResiduo, numeroComas, pagoRenta } from '../utils/formulas';

const TableAlivioFiscal = (formProps) => {
  const {
    anticipo,
    valorSeguro,
    interes,
    valorActivo,
    tipoActivo,
    comisionPorApertura,
    is24,
    is36,
    is48,
    is60,
    ...form
  } = formProps;
  const anticipoEnd = anticipo ?? 0;

  const meses = [
    {
      mes: 24,
    },
    { mes: 36 },
    { mes: 48 },
    { mes: 60 },
  ];

  const newMeses = meses.map((m) => {
    const residuo = getResiduo(m.mes, formProps);

    const pagoRentaMes = pagoRenta(interes, m.mes, anticipoEnd, valorActivo, residuo);

    const pagoInicial = anticipoEnd + comisionPorApertura + pagoRentaMes;
    const renta = pagoRentaMes * (m.mes - 1);
    const vr = Number(valorActivo * residuo);
    const costoBrutoArrendamiento = pagoInicial + renta + vr;
    const alivioFiscal = costoBrutoArrendamiento * 0.3 + pagoRentaMes;
    const costoNetoArrendamiento = costoBrutoArrendamiento - alivioFiscal;
    const diferencia = costoNetoArrendamiento - valorActivo;

    return {
      ...m,
      costoBrutoArrendamiento,
      alivioFiscal,
      costoNetoArrendamiento,
      diferencia,
    };
  });

  return (
    <Table titulo='Alivio Fiscal'>
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
          <td>Costo bruto de arrendamiento</td>
          {is24 && <td id='vr24'>{numeroComas(newMeses[0].costoBrutoArrendamiento)}</td>}
          {is36 && <td id='vr36'>{numeroComas(newMeses[1].costoBrutoArrendamiento)}</td>}
          {is48 && <td id='vr48'>{numeroComas(newMeses[2].costoBrutoArrendamiento)}</td>}
          {is60 && <td id='vr60'>{numeroComas(newMeses[3].costoBrutoArrendamiento)}</td>}
        </tr>
        <tr>
          <td>Alivio fiscal</td>
          {is24 && <td id='renta24_r'>{numeroComas(newMeses[0].alivioFiscal)}</td>}
          {is36 && <td id='renta36_r'>{numeroComas(newMeses[1].alivioFiscal)}</td>}
          {is48 && <td id='renta48_r'>{numeroComas(newMeses[2].alivioFiscal)}</td>}
          {is60 && <td id='renta60_r'>{numeroComas(newMeses[3].alivioFiscal)}</td>}
        </tr>
        <tr>
          <td>Costo neto de arrendamiento</td>
          {is24 && <td id='renta24_r'>{numeroComas(newMeses[0].costoNetoArrendamiento)}</td>}
          {is36 && <td id='renta36_r'>{numeroComas(newMeses[1].costoNetoArrendamiento)}</td>}
          {is48 && <td id='renta48_r'>{numeroComas(newMeses[2].costoNetoArrendamiento)}</td>}
          {is60 && <td id='renta60_r'>{numeroComas(newMeses[3].costoNetoArrendamiento)}</td>}
        </tr>
        <tr>
          <td>Costo del activo</td>
          {is24 && <td id='renta24_r'>{numeroComas(valorActivo)}</td>}
          {is36 && <td id='renta36_r'>{numeroComas(valorActivo)}</td>}
          {is48 && <td id='renta48_r'>{numeroComas(valorActivo)}</td>}
          {is60 && <td id='renta60_r'>{numeroComas(valorActivo)}</td>}
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Diferencia</th>
          {is24 && <th id='octot24'>{numeroComas(newMeses[0].diferencia)}</th>}
          {is36 && <th id='octot36'>{numeroComas(newMeses[1].diferencia)}</th>}
          {is48 && <th id='octot48'>{numeroComas(newMeses[2].diferencia)}</th>}
          {is60 && <th id='octot60'>{numeroComas(newMeses[3].diferencia)}</th>}
        </tr>
      </tfoot>
    </Table>
  );
};

export default TableAlivioFiscal;
