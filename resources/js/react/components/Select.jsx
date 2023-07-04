import React from 'react';

const Select = ({
  className = '',
  options = [],
  placeholder = '',
  label = '',
  name = '',
  value = '',
  onChange,
}) => {
  return (
    <div className={className}>
      <label htmlFor={`input${name}`}>{label}</label>
      <select
        onChange={onChange}
        value={value}
        id={`input${name}`}
        name={name}
        class='form-select text-white-dark'
      >
        <option value="">
          {placeholder}
        </option>
        {options.map((item) => (
          <option key={`option-${name}-${item.id}`} value={item.id}>
            {item.name}
          </option>
        ))}
      </select>
    </div>
  );
};

export default Select;
