import { useState } from "react";
import { calcularResiduo, formulaComision, isValid } from "../../utils/formulas";

const defaultValores = {
  nombreActivo: '',
  anio: '',
  tituloCotizacion: '',
  valorActivo: '',
  anticipo: '',
  anticipoPorcentaje: 0,
  comisionPorApertura: 0,
  comisionPorcentaje: 2.5,
  interes: 27,
  valorSeguro: '',
  tipoActivo: '',
  otro: '',
  valorResidual24: 45,
  valorResidual36: 40,
  valorResidual48: 35,
  valorResidual60: 30,
  valorResidual24Cantidad: 0,
  valorResidual36Cantidad: 0,
  valorResidual48Cantidad: 0,
  valorResidual60Cantidad: 0,
  isTelematics: true,
  isSeguro: true,
  is24: true,
  is36: true,
  is48: true,
  is60: true,
  isAlivioFiscal: false,
};

const useFoumulario = ({ row }) => {
  const [form, setForm] = useState(row ?? defaultValores);

  function onChangeForm({ target: { name, value } }) {
    setForm({
      ...form,
      [name]: value,
    });
  }

  function handleChangeCheckbox(name, value) {
    setForm({
      ...form,
      [name]: value,
    });
  }

  function onChangeFormNumber({ target: { name, value } }) {
    const newForm = {
      ...form,
      [name]: value ? Number(value) : '',
      comisionPorApertura: formulaComision(
        form.valorActivo,
        form.anticipo,
        form.comisionPorcentaje
      ),
    };

    if ('anticipoPorcentaje' === name) {
      onChangeAnticipoPorcentaje(newForm);
    } else if ('anticipo' === name) {
      onChangeAnticipo(newForm);
    } else if ('comisionPorcentaje' === name) {
      onChangeComisionPorcentaje(newForm);
    } else {
      setForm(newForm);
    }
  }

  function onChangeAnticipo(formNew) {
    if (!isValid(formNew.valorActivo)) {
      return;
    }

    const anticipoPorcentaje = parseInt(
      (formNew.anticipo * 100) / formNew.valorActivo
    );

    setForm({
      ...formNew,
      anticipoPorcentaje,
      comisionPorApertura: formulaComision(
        form.valorActivo,
        form.anticipo,
        form.comisionPorcentaje
      ),
    });
  }

  function onChangeAnticipoPorcentaje(formNew) {
    if (!isValid(formNew.valorActivo)) {
      return;
    }

    setForm({
      ...formNew,
      anticipo: parseInt(
        formNew.valorActivo * (formNew.anticipoPorcentaje / 100)
      ),
      comisionPorApertura: formulaComision(
        form.valorActivo,
        form.anticipo,
        form.comisionPorcentaje
      ),
    });
  }

  function onChangeTipoActivo({ target: { value } }) {
    const meses = [24, 36, 48, 60];
    const newData = {};

    meses.forEach((m) => {
      newData[`valorResidual${m}`] = calcularResiduo(value, m, 100);
    });

    setForm({
      ...form,
      ...newData,
      tipoActivo: value,
    });
  }

  function onChangeComisionPorcentaje(formNew) {
    if (!isValid(formNew.valorActivo)) {
      return;
    }

    const comisionPorApertura = formulaComision(
      formNew.valorActivo,
      formNew.anticipo,
      formNew.comisionPorcentaje
    );

    setForm({
      ...formNew,
      comisionPorApertura,
    });
  }

  return {
    form,
    onChangeForm,
    onChangeTipoActivo,
    onChangeFormNumber,
    handleChangeCheckbox
  }
}

export default useFoumulario