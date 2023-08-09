import React from 'react';
import Input from '../components/Input';
import useFoumulario from './hooks/useFoumulario';
import Select from '../components/Select';
import TableDatosActivos from './TableDatosActivos';
import InputRange from '../components/InputRange';
import Checkbox from '../components/Checkbox';
import TablePagoInicial from './TablePagoInicial';
import TablePagoMensual from './TablePagoMensual';
import TablePagoOc from './TablePagoOc';
import TableAlivioFiscal from './TableAlivioFiscal';

const Formulario = () => {
  const {
    form,
    token,
    onChangeForm,
    onChangeTipoActivo,
    onChangeFormNumber,
    handleChangeCheckbox,
    clientes,
    isAdmin,
    usuarios,
    maxValor
  } = useFoumulario({
    row: null,
  });

  return (
    <div className='grid grid-cols-1 gap-6 lg:grid-cols-2'>
      <div className='w-full'>
        <div className='panel'>
          <form action='/cotizaciones' method='post' onSubmit={() => console.table(form)}>
            <input type='hidden' name='_token' value={token} />
            <input type='hidden' name='comisionPorApertura' value={form.comisionPorApertura} />
            <input type="hidden" name="isTelematics" value={form.isTelematics ? 1 : 0} />
            <div className='grid grid-cols-1 gap-5 lg:grid-cols-2'>
              {isAdmin ? (
                <Select
                  label='Usuario'
                  name='cliente_id'
                  placeholder='Selcciona el usuario'
                  value={form.cliente_id}
                  className='lg:col-span-2'
                  options={clientes}
                  optionName='nombre'
                  optionRender={(item) => `${item.nombre} (${item.email})`}
                  onChange={onChangeForm}
                />
              ) : (
                <Select
                  label='Cliente'
                  name='usuario_id'
                  placeholder='Selcciona el cliente'
                  value={form.usuario_id}
                  className='lg:col-span-2'
                  options={usuarios}
                  optionName='nombre'
                  onChange={onChangeForm}
                />
              )}

              <Input
                label='Titulo de la cotización'
                name='tituloCotizacion'
                value={form.tituloCotizacion}
                placeholder='Propuesta de arrendamiento puro...'
                onChange={onChangeForm}
                className='lg:col-span-2'
              />
              <Select
                label='Tipo de activo'
                name='tipoActivo'
                value={form.tipoActivo}
                placeholder='Selcciona el tipo de activo...'
                onChange={onChangeTipoActivo}
                options={[
                  { id: 'V-std', name: 'Vehículo' },
                  { id: 'B-std', name: 'Vehículo blindado' },
                  { id: 'C-std', name: 'Equipo de computo' },
                  { id: 'otro', name: 'otro' },
                ]}
              />
              <Input
                label='Nombre activo'
                name='nombreActivo'
                value={form.nombreActivo}
                placeholder='Nombre del activo'
                onChange={onChangeForm}
              />
              <Input
                label='Año'
                name='anio'
                value={form.anio}
                placeholder='Año'
                onChange={onChangeFormNumber}
                type='number'
              />
              <Input
                label='Valor activo'
                name='valorActivo'
                value={form.valorActivo}
                placeholder='Valor del activo'
                onChange={onChangeFormNumber}
              />
              <div>
                <Input
                  label='Anticipo'
                  name='anticipo'
                  value={form.anticipo}
                  placeholder='Anticipo'
                  onChange={onChangeFormNumber}
                  type='number'
                  className='mb-2'
                />
                <InputRange
                  name='anticipoPorcentaje'
                  value={form.anticipoPorcentaje}
                  onChange={onChangeFormNumber}
                  step={0.5}
                  max={50}
                />
              </div>
              {isAdmin && (
                <>
                  <div>
                    <Input
                      label='Comisión por apertura'
                      name='comisionPorApertura'
                      value={form.comisionPorApertura}
                      placeholder='Comisión por apertura'
                      onChange={onChangeFormNumber}
                      type='number'
                      className='mb-2'
                    />
                    <InputRange
                      name='comisionPorcentaje'
                      value={form.comisionPorcentaje}
                      onChange={onChangeFormNumber}
                      step={0.5}
                      max={5}
                    />
                  </div>
                  <div>
                    <Input
                      label='Interés'
                      name='interes'
                      value={form.interes}
                      placeholder='Interés'
                      onChange={onChangeFormNumber}
                      type='number'
                      className='mb-2'
                    />
                    <InputRange
                      name='interes'
                      value={form.interes}
                      onChange={onChangeFormNumber}
                      step={0.5}
                      max={50}
                    />
                  </div>
                </>
              )}
              {form.isSeguro ? (
                 <Input
                 label='Valor del seguro anual'
                 name='valorSeguro'
                 value={form.valorSeguro}
                 placeholder='Valor del seguro anual'
                 onChange={onChangeFormNumber}
                 type='number'
                 className='mb-2'
               />
              ) :  <div />}
              <InputRange
                label='Valor residual 24 meses'
                name='valorResidual24'
                value={form.valorResidual24}
                onChange={onChangeFormNumber}
                step={0.5}
                max={maxValor[24]}
              />
              <InputRange
                label='Valor residual 36 meses'
                name='valorResidual36'
                value={form.valorResidual36}
                onChange={onChangeFormNumber}
                step={0.5}
                max={maxValor[36]}
              />
              <InputRange
                label='Valor residual 48 meses'
                name='valorResidual48'
                value={form.valorResidual48}
                onChange={onChangeFormNumber}
                step={0.5}
                max={maxValor[48]}
              />
              <InputRange
                label='Valor residual 60 meses'
                name='valorResidual60'
                value={form.valorResidual60}
                onChange={onChangeFormNumber}
                step={0.5}
                max={maxValor[60]}
              />
              <Checkbox
                label='¿Tiene Seguro?'
                name='isSeguro'
                value={form.isSeguro}
                onChange={handleChangeCheckbox}
              />
              <Checkbox
                label='¿Tiene Alivio Fiscal?'
                name='isAlivioFiscal'
                value={form.isAlivioFiscal}
                onChange={handleChangeCheckbox}
              />
              <h5 className='text-lg lg:col-span-2 font-semibold dark:text-white-light'>
                Meses a cotizar
              </h5>
              <div>
                <Checkbox
                  label='24meses'
                  name='is24'
                  value={form.is24}
                  onChange={handleChangeCheckbox}
                />
                <Checkbox
                  label='36meses'
                  name='is36'
                  value={form.is36}
                  onChange={handleChangeCheckbox}
                />
                <Checkbox
                  label='48meses'
                  name='is48'
                  value={form.is48}
                  onChange={handleChangeCheckbox}
                />
                <Checkbox
                  label='60meses'
                  name='is60'
                  value={form.is60}
                  onChange={handleChangeCheckbox}
                />
              </div>
              <div className='lg:col-span-2 flex justify-end'>
                <button type='submit' className='btn btn-primary'>
                  Guardar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div className='w-full'>
        {form.anticipo !== '' && form.valorActivo != '' ? (
            <>
            <div className='panel mb-4'>
          <TableDatosActivos {...form} />
        </div>
        <div className='panel mb-4'>
          <TablePagoInicial {...form} />
        </div>
        <div className='panel mb-4'>
          <TablePagoMensual {...form} />
        </div>
        <div className='panel'>
          <TablePagoOc {...form} />
        </div>
        {form.isAlivioFiscal && (
          <div className='panel mt-4'>
            <TableAlivioFiscal {...form} />
          </div>
        )}
            </>
        ) : (
            <div className='text-center'>
                <h2 className='text-xl'>Esperando datos faltantes</h2>
                <ul className='text-left'>
                    {form.anticipo === '' && <li>- Anticipo</li>}
                    {form.valorActivo === '' && <li>- Valor activo</li>}
                </ul>
            </div>
        )}

      </div>
    </div>
  );
};

export default Formulario;
