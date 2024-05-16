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
import Table from '../components/Table';

const Formulario = () => {
  const {
    form,
    token,
    onChangeForm,
    onChangeTipoActivo,
    onChangeSelect,
    onChangeFormNumber,
    handleChangeCheckbox,
    clientes,
    usuarios,
    maxValor,
    guardarCrearOtro,
    formArray,
    nivel
  } = useFoumulario({
    row: null,
  });

  return (
    <div className='grid grid-cols-1 gap-6 lg:grid-cols-2'>
      <div className='w-full'>
        <div className='panel'>
          <form action='/cotizaciones' method='post'>
            <input type='hidden' name='_token' value={token} />
            <input type='hidden' name='comisionPorApertura' value={form.comisionPorApertura} />
            <input type='hidden' name='isTelematics' value={form.isTelematics ? 1 : 0} />
            <input type='hidden' name='tituloCotizacion' value={form.tituloCotizacion} />
            <div className='grid grid-cols-1 gap-5 lg:grid-cols-2'>
              {(nivel === 1 || nivel === 4) ? (
                <>
                  {!form.cliente_id && (
                    <Select
                      label='Usuario'
                      name='usuario_id'
                      placeholder='Selecciona el usuario'
                      value={form.usuario_id}
                      className='lg:col-span-2'
                      options={usuarios}
                      optionRender={(item) => `${item.nombre} (${item.email})`}
                      optionName='nombre'
                      onChange={onChangeSelect}
                      required
                    />
                  )}
                  {!form.usuario_id && (
                    <Select
                      label='Cliente'
                      name='cliente_id'
                      placeholder='Selecciona el cliente'
                      value={form.cliente_id}
                      className='lg:col-span-2'
                      options={clientes}
                      optionName='nombre'
                      optionRender={(item) => `${item.nombre} (${item.email})`}
                      onChange={onChangeSelect}
                      required
                    />
                  )}
                </>
              ) : (
                <Select
                  label='Cliente'
                  name='cliente_id'
                  placeholder='Selecciona el cliente'
                  value={form.cliente_id}
                  className='lg:col-span-2'
                  options={clientes}
                  optionName='nombre'
                  onChange={onChangeSelect}
                  required
                />
              )}

              <Select
                label='Tipo de activo'
                name='tipoActivo'
                value={form.tipoActivo}
                placeholder='Selcciona el tipo de activo...'
                onChange={onChangeTipoActivo}
                required
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
                required
              />
              <Input
                label='Año'
                name='anio'
                value={form.anio}
                placeholder='Año'
                onChange={onChangeFormNumber}
                type='number'
                required
              />
              <Input
                label='Valor activo'
                name='valorActivo'
                value={form.valorActivo}
                placeholder='Valor del activo'
                onChange={onChangeFormNumber}
                required
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
                  required
                />
                <InputRange
                  name='anticipoPorcentaje'
                  value={form.anticipoPorcentaje}
                  onChange={onChangeFormNumber}
                  step={0.5}
                  max={50}
                />
              </div>
              {(nivel === 1 || nivel === 4) && (
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
                      required
                    />
                    <InputRange
                      name='comisionPorcentaje'
                      value={form.comisionPorcentaje}
                      onChange={onChangeFormNumber}
                      step={0.5}
                      max={5}
                      required
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
                      required
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
              {form.isSeguro && (nivel === 1 || nivel === 4) ? (
                <Input
                  label='Valor del seguro anual'
                  name='valorSeguro'
                  value={form.valorSeguro}
                  placeholder='Valor del seguro anual'
                  onChange={onChangeFormNumber}
                  type='number'
                  className='mb-2'
                  required
                />
              ) : (
                <div />
              )}
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
              {(nivel === 1 || nivel === 4) && (
                <Checkbox
                  label='¿Tiene Seguro?'
                  name='isSeguro'
                  value={form.isSeguro}
                  onChange={handleChangeCheckbox}
                />
              )}
              <Checkbox
                label='Incluir tabla de alivio fiscal'
                name='isAlivioFiscal'
                value={form.isAlivioFiscal}
                onChange={handleChangeCheckbox}
              />
              <Checkbox
                label='Incluir tabla de opción a compra'
                name='isOpcionCompra'
                value={form.isOpcionCompra}
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
              <div className='lg:col-span-2 flex justify-end gap-4'>
                <button
                  disabled={form.anticipo === '' && form.valorActivo === ''}
                  onClick={guardarCrearOtro}
                  type='button'
                  className='btn btn-secondary'
                >
                  Guardar y crear otro
                </button>
                {formArray.length === 0 && (
                  <button
                    disabled={form.anticipo === '' && form.valorActivo === ''}
                    type='submit'
                    className='btn btn-primary'
                  >
                    Guardar
                  </button>
                )}
              </div>
            </div>
          </form>
          {formArray.length > 0 && (
            <>
              <Table titulo='Cotizaciones'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  {formArray.map((item, index) => (
                    <tr key={`cotizacion-tr-${index}`}>
                      <td>{index + 1}</td>
                      <td>{item.nombreActivo}</td>
                    </tr>
                  ))}
                </tbody>
              </Table>
              <div className='lg:col-span-2 flex justify-end gap-4 mt-4'>
                <form action='/cotizaciones' method='POST'>
                  <input type='hidden' name='_token' value={token} />
                  {formArray.map((item, index) => {
                    const entries = Object.entries(item);

                    return entries.map((inp) => (
                      <input
                        key={`array[${index}][${inp[0]}]`}
                        type='hidden'
                        name={`array[${index}][${inp[0]}]`}
                        value={inp[1]}
                      />
                    ));
                  })}
                  <button type='submit' className='btn btn-primary'>
                    Guardar cotizaciones
                  </button>
                </form>
              </div>
            </>
          )}
        </div>
      </div>
      <div className='w-full'>
        {form.anticipo !== '' && form.valorActivo !== '' ? (
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
            {form.isOpcionCompra && (
              <div className='panel'>
                <TablePagoOc {...form} />
              </div>
            )}

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
