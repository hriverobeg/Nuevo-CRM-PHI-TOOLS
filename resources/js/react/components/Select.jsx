import React from 'react';

const Select = ({
  className = '',
  options = [],
  placeholder = '',
  label = '',
  name = '',
  value = '',
  onChange,
  optionId = 'id',
  optionName = 'name'
}) => {
  return (
    <div className={className}>
      <label htmlFor={`input${name}`}>{label}</label>
      <select
        onChange={onChange}
        value={value}
        id={`input${name}`}
        name={name}
        className='form-select text-white-dark'
      >
        <option value="">
          {placeholder}
        </option>
        {options.map((item) => (
          <option key={`option-${name}-${item[optionId]}`} value={item[optionId]}>
            {item[optionName]}
          </option>
        ))}
      </select>
    </div>
  );
};

export default Select;
