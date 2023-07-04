import React, { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';

import Formulario from './Formulario';

const rootElement = document.getElementById('cotizacion');
const root = createRoot(rootElement);

root.render(
  <StrictMode>
    <Formulario />
  </StrictMode>
);
