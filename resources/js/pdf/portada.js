import { getBase64FromUrl } from '../const';

export const portadaPDF = async (doc, cliente) => {
  const fondo = await getBase64FromUrl('https://iili.io/HXZwcFe.jpg');
  const logo = await getBase64FromUrl('https://iili.io/HXZwroN.png');

  const pdfHeight = doc.internal.pageSize.height;
  const pdfWidth = doc.internal.pageSize.width;

  doc.addImage(fondo, 'jpeg', 0, 0, pdfWidth, pdfHeight);
  doc.addImage(logo, 'png', 14, 25, 70, 21);

  const lines = doc.splitTextToSize(
    'PHI TOOLS - Propuesta de arrendamiento puro',
    100
  );

  doc
    .setTextColor(255, 255, 255)
    .setFontSize(40)
    .text(lines, 16, pdfHeight / 2 - 30);

  const margin = (num) => num * 6;
  const heigtEnd = pdfHeight - margin(10);
  doc.setTextColor(255, 255, 255).setFontSize(12);
  doc.setFont(undefined, 'bold');
  doc.text('Creado por', 16, heigtEnd);
  doc.text('Preparado para', pdfWidth / 2 + 30, heigtEnd);

  doc.setFont(undefined, 'normal');
  doc.text('Hector Rivero Beguerisse', 16, heigtEnd + margin(1));
  doc.text('Director Comercial PHI TOOLS', 16, heigtEnd + margin(2));
  doc.text('h.rivero@phitools.com.mx', 16, heigtEnd + margin(3));
  doc.text('+52(55)61227139', 16, heigtEnd + margin(4));
  doc.text('Av. México 45, Col. Hipódromo Condesa,', 16, heigtEnd + margin(5));
  doc.text('CDMX, C.P. 06100', 16, heigtEnd + margin(6));

  doc.text(cliente.nombre, pdfWidth / 2 + 30, heigtEnd + margin(1));
  doc.text(cliente.empresa, pdfWidth / 2 + 30, heigtEnd + margin(2));
};
