import React from 'react';
import SelectComponent from 'react-select';

const Select = ({
  className = '',
  options = [],
  placeholder = '',
  label = '',
  name = '',
  value = null,
  onChange,
  optionId = 'id',
  optionName = 'name',
  optionRender = null,
  required = false,
}) => {
  const optionLabel = (option) => option[optionName];
  const optionValue = (option) => option[optionId]
  const valueEnd = value ? options.find((f) => f[optionId] === value) : null;

  return (
    <div className={className}>
      <label htmlFor={`input${name}`}>{label}</label>
      <SelectComponent
        name={name}
        placeholder={placeholder}
        value={valueEnd}
        required={required}
        onChange={onChange}
        options={options}
        getOptionLabel={optionRender ?? optionLabel}
        getOptionValue={optionValue}
      />
    </div>
  );
};

export default Select;
