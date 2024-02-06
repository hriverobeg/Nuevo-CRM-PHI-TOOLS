import pmt from 'formula-pmt';
export function pagoRenta(
  interes,
  meses,
  anticipo,
  valordelactivo,
  residual = 0.4
) {
  var pago = pmt(
    interes / 100 / 12,
    meses,
    -valordelactivo + anticipo,
    residual * valordelactivo
  );
  return Math.ceil(pago);
}
export function pagoSeguro(interes, valorseguro) {
  var pagoSeguro = pmt(interes / 100 / 12, 12, -valorseguro);
  return Math.ceil(pagoSeguro);
}

export function numeroComas(num) {
  const numCalc = num ? Number(num).toFixed(0) : '0';
  return '$' + numCalc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}
export function calcularResiduo(categoria, meses, multiplier = 1) {
  if (categoria === 'V-std') {
    if (meses === 24) return 0.45 * multiplier;
    if (meses === 36) return 0.4 * multiplier;
    if (meses === 48) return 0.35 * multiplier;
    if (meses === 60) return 0.3 * multiplier;
  }
  if (categoria === 'B-std') {
    if (meses === 24) return 0.25 * multiplier;
    if (meses === 36) return 0.2 * multiplier;
    if (meses === 48) return 0.175 * multiplier;
    if (meses === 60) return 0.15 * multiplier;
  }
  if (categoria === 'C-std') {
    if (meses === 24) return 0.15 * multiplier;
    if (meses === 36) return 0.125 * multiplier;
    if (meses === 48) return 0.1 * multiplier;
    if (meses === 60) return 0.075 * multiplier;
  }
  if (categoria === 'otro') {
    if (meses === 24) return 0.15 * multiplier;
    if (meses === 36) return 0.125 * multiplier;
    if (meses === 48) return 0.1 * multiplier;
    if (meses === 60) return 0.075 * multiplier;
  }
  return 0;
}
export const getResiduo = (meses, form) => {
  if (meses === 24)
    return parseFloat(Number(form.valorResidual24) / 100).toFixed(3);
  if (meses === 36)
    return parseFloat(Number(form.valorResidual36) / 100).toFixed(3);
  if (meses === 48)
    return parseFloat(Number(form.valorResidual48) / 100).toFixed(3);
  if (meses === 60)
    return parseFloat(Number(form.valorResidual60) / 100).toFixed(3);

  return 0;
};

export const isValid = (value) => value !== null && value !== 0 && value !== '';

export const formulaComision = (valorActivo, anticipo, comisionPorcentaje) => {
  const montoFinanciar = valorActivo - anticipo;
  return parseInt(montoFinanciar * (comisionPorcentaje / 100));
};

