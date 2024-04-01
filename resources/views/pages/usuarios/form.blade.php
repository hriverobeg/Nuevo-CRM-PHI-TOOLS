<div>
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" x-model="form.nombre" required type="text" class="form-input mt-1" placeholder="Nombre" />
</div>
<div>
  <label for="email">Email</label>
  <input id="email" name="email" x-model="form.email" required type="text" class="form-input mt-1" placeholder="Email" />
</div>
<div>
    <label for="password">Contraseña</label>
    <input
        id="password"
        name="password"
        x-model="form.password"
        type="password"
        class="form-input mt-1"
        placeholder="Contraseña"
        />
  </div>
<div>
  <label for="telefono">Teléfono</label>
  <input id="telefono" name="telefono" x-model="form.telefono" required type="text" class="form-input mt-1" placeholder="Teléfono" />
</div>
<div>
  <label for="empresa">Empresa</label>
  <input id="empresa" name="empresa" x-model="form.empresa" required type="text" class="form-input mt-1" placeholder="Empresa" />
</div>
<div>
    <label for="interes">Interés</label>
    <input id="interes" name="interes" x-model="form.interes ?? 27" required type="text" class="form-input mt-1" placeholder="interes" />
</div>
<div>
    <label for="comisionPorcentaje">Comisión por apertura %</label>
    <input id="comisionPorcentaje" name="comisionPorcentaje" x-model="form.comisionPorcentaje ?? 2.5" required type="text" class="form-input mt-1" placeholder="comisionPorcentaje" />
</div>

