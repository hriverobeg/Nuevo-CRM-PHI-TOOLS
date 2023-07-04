import React from 'react';

const Checkbox = ({ name, label, value, onChange }) => {
  return (
    <div>
      <label htmlFor={name} className='flex items-center cursor-pointer'>
        <input
          type='checkbox'
          className='form-checkbox'
          checked={value}
          id={name}
          name={name}
          onChange={() => onChange(name, !value)}
        />
        <span className=' text-white-dark'>{label}</span>
      </label>
    </div>
  );
};

export default Checkbox;
