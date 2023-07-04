import React from 'react';

const InputRange = ({ min = 0, max = 100, step = 1, value = 0, name = '', onChange, label }) => {
  return (
    <div>
      {label && <label>{label}</label>}
      <div className='flex gap-4 items-center'>
        <input
          type='range'
          min={min}
          max={max}
          step={step}
          value={value}
          name={name}
          onChange={onChange}
          className='w-full py-2.5'
        />
        <div style={{ width: '60px', flex: '0 0 60px' }} class='font-bold'>
          <span class='inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark'>
            {value}
          </span>
          <span>%</span>
        </div>
      </div>
    </div>
  );
};

export default InputRange;
