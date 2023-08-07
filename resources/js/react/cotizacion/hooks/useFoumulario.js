import { useEffect, useState } from 'react';
import { calcularResiduo, formulaComision, isValid } from '../../../utils/formulas';

const defaultValores = {
  cliente_id: null,
  usuario_id: null,
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

const ejemplo1 = {
  tituloCotizacion: '4000',
  nombreActivo: 'Item 1',
  anio: 2023,
  valorActivo: 1000000,
  anticipo: 190000,
  anticipoPorcentaje: 19,
  comisionPorApertura: 25000,
  comisionPorcentaje: 2.5,
  interes: 27,
  valorSeguro: 4000,
  tipoActivo: 'B-std',
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
  is36: false,
  is48: false,
  is60: true,
  isAlivioFiscal: true,
};

const useFoumulario = ({ row }) => {
  const [form, setForm] = useState(row ?? defaultValores);
  const [token, setToken] = useState('');
  const [clientes, setClientes] = useState([]);
  const [usuarios, setUsuarios] = useState([]);
  const [maxValor, setMaxValor] = useState({
    24: 50, 36: 50, 48: 50, 60: 50
  })
  const [isAdmin, setIsAdmin] = useState(false);

  useEffect(() => {
    setToken(document.querySelector('meta[name="csrf-token"]').content);
    const {
      clientes: clients,
      usuarios: users,
      isAdmin: admin,
      interes: interesCliente,
      comisionPorcentaje: comisionPorcentajeCliente
    } = window.Laravel;
    setIsAdmin(admin);
    setClientes(clients);
    setUsuarios(users);
    if (!isAdmin) {
        onChangeFormNumber({ target: { name: 'interes', value: interesCliente } })
        onChangeFormNumber({ target: { name: 'comisionPorcentaje', value: comisionPorcentajeCliente } })
    }

  }, []);

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
        form.comisionPorcentaje,
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

    const anticipoPorcentaje = parseInt((formNew.anticipo * 100) / formNew.valorActivo);

    setForm({
      ...formNew,
      anticipoPorcentaje,
      comisionPorApertura: formulaComision(
        form.valorActivo,
        form.anticipo,
        form.comisionPorcentaje,
      ),
    });
  }

  function onChangeAnticipoPorcentaje(formNew) {
    if (!isValid(formNew.valorActivo)) {
      return;
    }

    setForm({
      ...formNew,
      anticipo: parseInt(formNew.valorActivo * (formNew.anticipoPorcentaje / 100)),
      comisionPorApertura: formulaComision(
        form.valorActivo,
        form.anticipo,
        form.comisionPorcentaje,
      ),
    });
  }

  function onChangeTipoActivo({ target: { value } }) {
    const meses = [24, 36, 48, 60];
    const newData = {};
    const newMaxValor = {...maxValor}

    meses.forEach((m) => {
      newData[`valorResidual${m}`] = calcularResiduo(value, m, 100);
      newMaxValor[m] = calcularResiduo(value, m, 100) + 5
    });

    setMaxValor(newMaxValor)

    setForm({
      ...form,
      ...newData,
      isTelematics: value === 'V-std' || value === 'B-std' ? true : false,
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
      formNew.comisionPorcentaje,
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
    handleChangeCheckbox,
    token,
    clientes,
    usuarios,
    isAdmin,
    maxValor
  };
};

export default useFoumulario;
