<section class="py-4 text-center">
  <h1 class="h3">Consulta de tickets</h1>
  <p class="lead text-secondary mb-0">Listado de tickets registrados en el sistema.</p>
</section>

<section class="mb-4" aria-labelledby="tituloBusqueda">
  <h2 id="tituloBusqueda" class="visually-hidden">Buscar tickets</h2>

  <form class="row g-2 justify-content-center" role="search" method="GET" >
    <input type="hidden" name="action" value="list">

    <div class="col-md-6">
      <label for="busqueda" class="visually-hidden">Buscar</label>
      <input type="search" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar por código, asunto o solicitante" value="">
    </div>

    <div class="col-md-auto d-flex gap-2">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
  </form>
</section>

<div class="row g-4">

  <section class="col-lg-12" aria-labelledby="tituloListado">
    <h2 id="tituloListado" class="h5 mb-3">Tickets generados</h2>

    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
        <caption class="visually-hidden">Tickets registrados en el sistema</caption>
        <thead class="table-dark">
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Asunto</th>
            <th scope="col">Solicitante</th>
            <th scope="col">Tipo</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha</th>
            <th scope="col" class="text-end">Acciones</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <th scope="row">I-021547</th>
            <td>Cambio de correo en el sistema de titulación</td>
            <td>Marcela Andrade Pozo</td>
            <td>Sistema académico</td>
            <td><span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Alta</span></td>
            <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Finalizado</span></td>
            <td><time datetime="2026-09-03">03/09/2026</time></td>
            <td class="text-end text-nowrap">
              <a class="btn btn-sm btn-outline-primary" href="#">Ver</a>
              <a class="btn btn-sm btn-outline-danger" href="#">Eliminar</a>
            </td>
          </tr>

          <tr>
            <th scope="row">I-021149</th>
            <td>Activación de correo departamental</td>
            <td>Luis Fernando Cabrera</td>
            <td>Cuentas y accesos</td>
            <td><span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Alta</span></td>
            <td><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Pendiente</span></td>
            <td><time datetime="2026-09-02">02/09/2026</time></td>
            <td class="text-end text-nowrap">
              <a class="btn btn-sm btn-outline-primary" href="#">Ver</a>
              <a class="btn btn-sm btn-outline-danger" href="#">Eliminar</a>
            </td>
          </tr>

          <tr>
            <th scope="row">I-020054</th>
            <td>Problema con el autenticador 2FA</td>
            <td>Diana Carolina Ruiz</td>
            <td>Cuentas y accesos</td>
            <td><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Media</span></td>
            <td><span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">En espera</span></td>
            <td><time datetime="2026-08-31">31/08/2026</time></td>
            <td class="text-end text-nowrap">
              <a class="btn btn-sm btn-outline-primary" href="#">Ver</a>
              <a class="btn btn-sm btn-outline-danger" href="#">Eliminar</a>
            </td>
          </tr>

          <tr>
            <th scope="row">I-018614</th>
            <td>Inicio de sesión bloqueado</td>
            <td>Jorge Patricio Salazar</td>
            <td>Cuentas y accesos</td>
            <td><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Media</span></td>
            <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Finalizado</span></td>
            <td><time datetime="2026-08-27">27/08/2026</time></td>
            <td class="text-end text-nowrap">
              <a class="btn btn-sm btn-outline-primary" href="#">Ver</a>
              <a class="btn btn-sm btn-outline-danger" href="#">Eliminar</a>
            </td>
          </tr>

          <tr>
            <th scope="row">I-018420</th>
            <td>Impresora de secretaría sin conexión</td>
            <td>Ana Lucía Terán</td>
            <td>Equipos e impresión</td>
            <td><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Baja</span></td>
            <td><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Pendiente</span></td>
            <td><time datetime="2026-08-26">26/08/2026</time></td>
            <td class="text-end text-nowrap">
              <a class="btn btn-sm btn-outline-primary" href="#">Ver</a>
              <a class="btn btn-sm btn-outline-danger" href="#">Eliminar</a>
            </td>
          </tr>

          <tr>
            <th scope="row">I-018233</th>
            <td>Curso no visible en el aula virtual</td>
            <td>Byron Estuardo Guamán</td>
            <td>Aula virtual</td>
            <td><span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Alta</span></td>
            <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Finalizado</span></td>
            <td><time datetime="2026-08-24">24/08/2026</time></td>
            <td class="text-end text-nowrap">
              <a class="btn btn-sm btn-outline-primary" href="#">Ver</a>
              <a class="btn btn-sm btn-outline-danger" href="#">Eliminar</a>
            </td>
          </tr>

          <tr>
            <th scope="row">I-017988</th>
            <td>Solicitud de instalación de ofimática</td>
            <td>Paulina Vinueza Ortega</td>
            <td>Software</td>
            <td><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Baja</span></td>
            <td><span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">En espera</span></td>
            <td><time datetime="2026-08-21">21/08/2026</time></td>
            <td class="text-end text-nowrap">
              <a class="btn btn-sm btn-outline-primary" href="#">Ver</a>
              <a class="btn btn-sm btn-outline-danger" href="#">Eliminar</a>
            </td>
          </tr>

          <tr>
            <th scope="row">I-017315</th>
            <td>Error al registrar calificaciones</td>
            <td>Héctor Manuel Chávez</td>
            <td>Sistema académico</td>
            <td><span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Alta</span></td>
            <td><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Pendiente</span></td>
            <td><time datetime="2026-08-14">14/08/2026</time></td>
            <td class="text-end text-nowrap">
              <a class="btn btn-sm btn-outline-primary" href="#">Ver</a>
              <a class="btn btn-sm btn-outline-danger" href="#">Eliminar</a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>

    <p class="alert alert-info d-none" role="status">
      No se encontraron tickets que coincidan con la búsqueda.
    </p>
  </section>

</div>