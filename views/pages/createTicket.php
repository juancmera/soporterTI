<section class="py-4 text-center">
  <h1 class="h3">Registrar Incidente</h1>
  <p class="lead text-secondary mb-0">
    Los campos marcados con asterisco son obligatorios.
  </p>
</section>
<section class="py-4">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <form class="card" id="formTicket" method="POST" action="index.php?action=create" novalidate>

        <fieldset class="py-4 px-4">
          <legend class="h5 mb-3">Datos del solicitante</legend>

          <div class="row g-3">

            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre completo *</label>
              <input type="text" class="form-control" id="nombre" name="nombre" maxlength="100" autocomplete="name" required autofocus value="<?= htmlspecialchars($old['nombre'] ?? '') ?>">

              <div class="invalid-feedback" id="error-nombre">
                <?= htmlspecialchars($errors['nombre'] ?? '') ?>
              </div>
            </div>

            <div class="col-md-6">
              <label for="correo" class="form-label">Correo electrónico *</label>
              <input type="email"
                class="form-control" id="correo" name="correo" maxlength="120"
                autocomplete="email" required value="<?= htmlspecialchars($old['correo'] ?? '') ?>">

              <div class="invalid-feedback" id="error-correo">
                <?= htmlspecialchars($errors['correo'] ?? '') ?>
              </div>
            </div>

            <div class="col-md-6">
              <label for="extension" class="form-label">Extensión telefónica *</label>
              <input type="text"
                class="form-control" id="extension" name="extension" maxlength="4" inputmode="numeric" pattern="\d{3,4}" aria-describedby="ayudaExtension" required value="<?= htmlspecialchars($old['extension'] ?? '') ?>">
              <div class="form-text" id="ayudaExtension">3 o 4 dígitos.</div>

              <div class="invalid-feedback" id="error-extension">
                <?= htmlspecialchars($errors['extension'] ?? '') ?>
              </div>
            </div>

            <div class="col-md-6">
              <label for="area" class="form-label">Área o dependencia *</label>
              <select class="form-select " id="area" name="area" required>
                <option value="">Selecciona un área</option>
                <option value="Decanato">Decanato</option>
                <option value="Direccion">Dirección</option>
                <option value="Secretaria">Secretaría</option>
                <option value="Docencia">Docencia</option>
                <option value="Estudiantes">Estudiantes</option>
                <option value="Biblioteca">Biblioteca</option>
              </select>

              <div class="invalid-feedback" id="error-area">
                <?= htmlspecialchars($errors['area'] ?? '') ?>
              </div>
            </div>

          </div>
        </fieldset>

        <fieldset class="py-4 px-4 pt-0">
          <legend class="h5 mb-3">Detalle de la incidencia</legend>

          <div class="row g-3">

            <div class="col-md-6">
              <label for="tipo_incidencia" class="form-label">Tipo de incidencia *</label>
              <select class="form-select"
                id="tipo_incidencia" name="tipo_incidencia" required>
                <option value="">Selecciona un tipo</option>
                <option value="Equipo de computo">Equipo de cómputo</option>
                <option value="Red e internet">Red e internet</option>
                <option value="Correo institucional">Correo institucional</option>
                <option value="Sistema academico">Sistema académico</option>
                <option value="Impresion">Impresión</option>
                <option value="Software">Software</option>
                <option value="Otro">Otro</option>
              </select>

              <div class="invalid-feedback" id="error-tipo_incidencia">
                <?= htmlspecialchars($errors['tipo_incidencia'] ?? '') ?>
              </div>
            </div>

            <div class="col-md-6">
              <label for="prioridad" class="form-label">Prioridad *</label>
              <select class="form-select"
                id="prioridad" name="prioridad" required>
                <option value="">Selecciona</option>
                <option value="Baja">Baja</option>
                <option value="Media">Media</option>
                <option value="Alta">Alta</option>
              </select>

              <div class="invalid-feedback" id="error-prioridad">
                <?= htmlspecialchars($errors['prioridad'] ?? '') ?>
              </div>
            </div>

            <div class="col-12">
              <label for="asunto" class="form-label">Asunto *</label>
              <input type="text" class="form-control" id="asunto" name="asunto" maxlength="100" autocomplete="asunto" required value="<?= htmlspecialchars($old['asunto'] ?? '') ?>">

              <div class="invalid-feedback" id="error-asunto">
                <?= htmlspecialchars($errors['asunto'] ?? '') ?>
              </div>
            </div>

            <div class="col-12">
              <label for="descripcion" class="form-label">Descripción del problema *</label>
              <textarea class="form-control"
                id="descripcion" name="descripcion" rows="4"
                minlength="20" maxlength="500"
                aria-describedby="ayudaDescripcion" required></textarea>
              <div class="form-text" id="ayudaDescripcion" aria-live="polite">
                Mínimo 20 caracteres. <span id="contador">0</span>/500
              </div>

              <div class="invalid-feedback" id="error-descripcion">
                <?= htmlspecialchars($errors['descripcion'] ?? '') ?>
              </div>
            </div>

          </div>
        </fieldset>

        <div class="d-flex gap-2 px-4 pb-4">
          <button type="submit" class="btn btn-primary">Registrar incidente.</button>
          <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
        </div>

      </form>

    </div>
  </div>

</section>