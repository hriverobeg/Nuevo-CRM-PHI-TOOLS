import React from 'react'

const Input = ({ label, name, type = "text", className = "", ...props  }) => {
  return (
    <div className={className}>
      <label htmlFor={`input${name}`}>{label}</label>
      <input
        id={`input${name}`}
        type={type}
        name={name}
        className="form-input"
        {...props}
        />
    </div>
  )
}

export default Input
