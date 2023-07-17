import { jsPDF } from 'jspdf';
import autoTable, { applyPlugin } from 'jspdf-autotable';
applyPlugin(jsPDF);
import { pagoRenta, numeroComas, pagoSeguro, getResiduo } from '../utils/formulas';
import { footerPDF } from './footer';
import { portadaPDF } from './portada';

const footStyles = {
  fillColor: '#FFF',
  textColor: '#000',
  fontStyle: 'bold',
};

const meses = [24, 36, 48, 60];

async function createPDF(param, cliente) {
  var doc = new jsPDF();

  await portadaPDF(doc, cliente);

  const pdfWidth = doc.internal.pageSize.width;

  doc.setTextColor(0, 0, 0).setFontSize(11);

  doc.addPage();

  var pdfArray = [];
  if (Array.isArray(param)) {
    pdfArray = param;
  } else {
    pdfArray = [{ ...param }];
  }

  for (var x = 0; x < pdfArray.length; x += 1) {
    const item = pdfArray[x];

    const newMeses = meses.map((m) => {
      const residuo = getResiduo(m, item);

      const pagoRentaMes = pagoRenta(
        item.interes,
        m,
        item.anticipo,
        item.valorActivo,
        residuo
      );

      const pagoInicial =
        item.anticipo + item.comisionPorApertura + pagoRentaMes;
      const renta = pagoRentaMes * (m - 1);
      const vr = Number(item.valorActivo * residuo);
      const costoBrutoArrendamiento = pagoInicial + renta + vr;
      const alivioFiscal = costoBrutoArrendamiento * 0.3 + pagoRentaMes;
      const costoNetoArrendamiento = costoBrutoArrendamiento - alivioFiscal;
      const diferencia = costoNetoArrendamiento - item.valorActivo;
      const pagoSeguroMensual = item.isSeguro
        ? pagoSeguro(item.interes, item.valorSeguro)
        : 0;

      return {
        mes: m,
        pagoRentaMes,
        pagoInicial,
        renta,
        residuo,
        costoBrutoArrendamiento,
        alivioFiscal,
        costoNetoArrendamiento,
        diferencia,
        pagoSeguroMensual,
        vr,
      };
    });

    let image = 'https://iili.io/HUA4d3F.jpg';
    let ext = 'jpg';

    if (item.tipoActivo === 'V-std') {
      image = 'https://iili.io/HUA4d3F.jpg';
      ext = 'jpg';
    }

    if (item.tipoActivo === 'B-std') {
      image = 'https://iili.io/HUA4AyG.png';
      ext = 'png';
    }

    if (item.tipoActivo === 'C-std') {
      image = 'https://iili.io/HUA4fTv.webp';
      ext = 'webp';
    }

    const pdfWidthHalf = pdfWidth / 2;

    doc.addImage(image, ext, 14, 20, pdfWidthHalf - 20, 31);

    doc
      .setFontSize(14)
      .setFont(undefined, 'bold')
      .text(`Propuesta de arrendamiento puro ${item.tituloCotizacion}`, 14, 15);
    autoTable(doc, {
      startY: 20,
      margin: { left: pdfWidth / 2 },
      head: [['Datos de cotización', '']],
      body: [
        ['Datos del activo', item.nombreActivo],
        ['Año', item.anio],
        ['Valor del activo', numeroComas(item.valorActivo)],
      ],
    });
    var finalY = doc.lastAutoTable.finalY;
    doc.setFontSize(11).text('Pago Inicial', 14, finalY + 10);
    autoTable(doc, {
      startY: finalY + 15,
      head: [
        [
          'Concepto',
          ...(item.is24 ? [['24 meses']] : []),
          ...(item.is36 ? [['36 meses']] : []),
          ...(item.is48 ? [['48 meses']] : []),
          ...(item.is60 ? [['60 meses']] : []),
        ],
      ],
      body: [
        [
          'Anticipo',
          numeroComas(item.anticipo),
          numeroComas(item.anticipo),
          numeroComas(item.anticipo),
          numeroComas(item.anticipo),
        ],
        [
          'Comisión por apertura',
          numeroComas(item.comisionPorApertura),
          numeroComas(item.comisionPorApertura),
          numeroComas(item.comisionPorApertura),
          numeroComas(item.comisionPorApertura),
        ],
        [
          'Renta en depósito',
          ...(item.is24 ? [[numeroComas(newMeses[0].pagoRentaMes)]] : []),
          ...(item.is36 ? [[numeroComas(newMeses[1].pagoRentaMes)]] : []),
          ...(item.is48 ? [[numeroComas(newMeses[2].pagoRentaMes)]] : []),
          ...(item.is60 ? [[numeroComas(newMeses[3].pagoRentaMes)]] : []),
        ],
      ],
      foot: [
        [
          'Total',
          ...(item.is24
            ? [
                [
                  numeroComas(
                    item.anticipo +
                      item.comisionPorApertura +
                      newMeses[0].pagoRentaMes
                  ),
                ],
              ]
            : []),
          ...(item.is36
            ? [
                [
                  numeroComas(
                    item.anticipo +
                      item.comisionPorApertura +
                      newMeses[1].pagoRentaMes
                  ),
                ],
              ]
            : []),
          ...(item.is48
            ? [
                [
                  numeroComas(
                    item.anticipo +
                      item.comisionPorApertura +
                      newMeses[2].pagoRentaMes
                  ),
                ],
              ]
            : []),
          ...(item.is60
            ? [
                [
                  numeroComas(
                    item.anticipo +
                      item.comisionPorApertura +
                      newMeses[3].pagoRentaMes
                  ),
                ],
              ]
            : []),
        ],
      ],
      footStyles,
    });
    var finalY = doc.lastAutoTable.finalY;
    doc.setFontSize(11).text('Pagos mensuales', 14, finalY + 10);
    autoTable(doc, {
      startY: finalY + 15,
      head: [
        [
          'Concepto',
          ...(item.is24 ? [['24 meses']] : []),
          ...(item.is36 ? [['36 meses']] : []),
          ...(item.is48 ? [['48 meses']] : []),
          ...(item.is60 ? [['60 meses']] : []),
        ],
      ],
      body: [
        [
          'Renta',
          ...(item.is24 ? [[numeroComas(newMeses[0].pagoRentaMes)]] : []),
          ...(item.is36 ? [[numeroComas(newMeses[1].pagoRentaMes)]] : []),
          ...(item.is48 ? [[numeroComas(newMeses[2].pagoRentaMes)]] : []),
          ...(item.is60 ? [[numeroComas(newMeses[3].pagoRentaMes)]] : []),
        ],
        ...(item.isSeguro
          ? [
              [
                'Seguro',
                numeroComas(newMeses[0].pagoSeguroMensual),
                numeroComas(newMeses[1].pagoSeguroMensual),
                numeroComas(newMeses[2].pagoSeguroMensual),
                numeroComas(newMeses[3].pagoSeguroMensual),
              ],
            ]
          : []),
        ...(item.isTelematics
          ? [
              [
                'Telematics',
                ...(item.is24 ? [[numeroComas(483)]] : []),
                ...(item.is36 ? [[numeroComas(491)]] : []),
                ...(item.is48 ? [[numeroComas(517)]] : []),
                ...(item.is60 ? [[numeroComas(522)]] : []),
              ],
            ]
          : []),
      ],
      foot: [
        [
          'Total',
          ...(item.is24
            ? [
                [
                  numeroComas(
                    newMeses[0].pagoRentaMes +
                      newMeses[0].pagoSeguroMensual +
                      (item.isTelematics ? 483 : 0)
                  ),
                ],
              ]
            : []),
          ...(item.is36
            ? [
                [
                  numeroComas(
                    newMeses[1].pagoRentaMes +
                      newMeses[1].pagoSeguroMensual +
                      (item.isTelematics ? 491 : 0)
                  ),
                ],
              ]
            : []),
          ...(item.is48
            ? [
                [
                  numeroComas(
                    newMeses[2].pagoRentaMes +
                      newMeses[2].pagoSeguroMensual +
                      (item.isTelematics ? 517 : 0)
                  ),
                ],
              ]
            : []),
          ...(item.is60
            ? [
                [
                  numeroComas(
                    newMeses[3].pagoRentaMes +
                      newMeses[3].pagoSeguroMensual +
                      (item.isTelematics ? 522 : 0)
                  ),
                ],
              ]
            : []),
        ],
      ],
      footStyles,
    });
    var finalY = doc.lastAutoTable.finalY;
    doc.setFontSize(11).text('Opción a compra', 14, finalY + 10);
    autoTable(doc, {
      startY: finalY + 15,
      head: [
        [
          'Concepto',
          ...(item.is24 ? [['24 meses']] : []),
          ...(item.is36 ? [['36 meses']] : []),
          ...(item.is48 ? [['48 meses']] : []),
          ...(item.is60 ? [['60 meses']] : []),
        ],
      ],
      body: [
        [
          'Valor residual',
          ...(item.is24 ? [[numeroComas(newMeses[0].vr)]] : []),
          ...(item.is36 ? [[numeroComas(newMeses[1].vr)]] : []),
          ...(item.is48 ? [[numeroComas(newMeses[2].vr)]] : []),
          ...(item.is60 ? [[numeroComas(newMeses[3].vr)]] : []),
        ],

        [
          'Devolución renta en depósito',
          ...(item.is24 ? [[numeroComas(newMeses[0].pagoRentaMes)]] : []),
          ...(item.is36 ? [[numeroComas(newMeses[1].pagoRentaMes)]] : []),
          ...(item.is48 ? [[numeroComas(newMeses[2].pagoRentaMes)]] : []),
          ...(item.is60 ? [[numeroComas(newMeses[3].pagoRentaMes)]] : []),
        ],
      ],
      foot: [
        [
          'Total',
          ...(item.is24
            ? [[numeroComas(newMeses[0].vr - newMeses[0].pagoRentaMes)]]
            : []),
          ...(item.is36
            ? [[numeroComas(newMeses[1].vr - newMeses[0].pagoRentaMes)]]
            : []),
          ...(item.is48
            ? [[numeroComas(newMeses[2].vr - newMeses[2].pagoRentaMes)]]
            : []),
          ...(item.is60
            ? [[numeroComas(newMeses[3].vr - newMeses[3].pagoRentaMes)]]
            : []),
        ],
      ],
      footStyles,
    });

    if (item.isAlivioFiscal) {
      var finalY = doc.lastAutoTable.finalY;
      doc.setFontSize(11).text('Alivio Fiscal', 14, finalY + 10);
      autoTable(doc, {
        startY: finalY + 15,
        head: [
          [
            'Concepto',
            ...(item.is24 ? [['24 meses']] : []),
            ...(item.is36 ? [['36 meses']] : []),
            ...(item.is48 ? [['48 meses']] : []),
            ...(item.is60 ? [['60 meses']] : []),
          ],
        ],
        body: [
          [
            'Costo bruto de arrendamiento',
            ...(item.is24
              ? [[numeroComas(newMeses[0].costoBrutoArrendamiento)]]
              : []),
            ...(item.is36
              ? [[numeroComas(newMeses[1].costoBrutoArrendamiento)]]
              : []),
            ...(item.is48
              ? [[numeroComas(newMeses[2].costoBrutoArrendamiento)]]
              : []),
            ...(item.is60
              ? [[numeroComas(newMeses[3].costoBrutoArrendamiento)]]
              : []),
          ],
          [
            'Alivio fiscal',
            ...(item.is24 ? [[numeroComas(newMeses[0].alivioFiscal)]] : []),
            ...(item.is36 ? [[numeroComas(newMeses[1].alivioFiscal)]] : []),
            ...(item.is48 ? [[numeroComas(newMeses[2].alivioFiscal)]] : []),
            ...(item.is60 ? [[numeroComas(newMeses[3].alivioFiscal)]] : []),
          ],
          [
            'Costo neto de arrendamiento',
            ...(item.is24
              ? [[numeroComas(newMeses[0].costoNetoArrendamiento)]]
              : []),
            ...(item.is36
              ? [[numeroComas(newMeses[1].costoNetoArrendamiento)]]
              : []),
            ...(item.is48
              ? [[numeroComas(newMeses[2].costoNetoArrendamiento)]]
              : []),
            ...(item.is60
              ? [[numeroComas(newMeses[3].costoNetoArrendamiento)]]
              : []),
          ],
          [
            'Costo del activo',
            ...(item.is24 ? [[numeroComas(item.valorActivo)]] : []),
            ...(item.is36 ? [[numeroComas(item.valorActivo)]] : []),
            ...(item.is48 ? [[numeroComas(item.valorActivo)]] : []),
            ...(item.is60 ? [[numeroComas(item.valorActivo)]] : []),
          ],
        ],
        foot: [
          [
            'Diferencia',
            ...(item.is24 ? [[numeroComas(newMeses[0].diferencia)]] : []),
            ...(item.is36 ? [[numeroComas(newMeses[1].diferencia)]] : []),
            ...(item.is48 ? [[numeroComas(newMeses[2].diferencia)]] : []),
            ...(item.is60 ? [[numeroComas(newMeses[3].diferencia)]] : []),
          ],
        ],
        footStyles,
      });
    }

    footerPDF(doc);
    if (x < pdfArray.length - 1) {
      doc.addPage();
    }
  }

  doc.save('Cotización de arrendamiento.pdf');
}

window.createPDF = createPDF
window.pagoRenta = pagoRenta
