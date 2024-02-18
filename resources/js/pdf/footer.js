export const footerPDF = (doc, isAlivioFiscal = false) => {
    const width = 16;
    const margin = (num) => num * 5;
    const marginFooter = isAlivioFiscal ? 30 : 50
    const height =  doc.internal.pageSize.height - marginFooter;

    doc.setFontSize(6);
    doc.setFont(undefined, 'normal');
    doc.text('*Precios incluyen IVA.', width, height);
    doc.text(
      '*A la firma del contrato se incluirá el mes 1.',
      width,
      height + margin(1)
    );
    doc.text(
      '*Los trámites relacionados correrán a cargo del cliente y se incluirán en el pago inicial.',
      width,
      height + margin(2)
    );
    doc.text(
      '*Precios expresados en pesos mexicanos.',
      width,
      height + margin(3)
    );
    doc.text(
      '*El seguro será contratado por la arrendadora a cargo del cliente mensual.',
      width,
      height + margin(4)
    );
    doc.text(
      '*Plan sujeto a aprobación de crédito y modificación en caso de que el comité de crédito lo sugiera.',
      width,
      height + margin(5)
    );
    doc.page++;
  };
