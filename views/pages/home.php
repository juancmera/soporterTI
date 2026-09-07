<!-- views/pages/home.php -->
<section class="p-5 mb-4 bg-body-tertiary rounded-3">
  <h1 class="display-5 fw-bold">Mesa de ayuda</h1>
  <p class="fs-5 text-secondary mb-0">
    Reporte Incidentes y consulte el estado de sus solicitudes.
  </p>
</section>

<section class="mb-5">
  <h2 class="h5 mb-3">Resumen de Incidentes</h2>
  <div class="row row-cols-2 row-cols-md-4 g-3">
    <div class="col">
      <div class="card text-center h-100">
        <div class="card-body">
          <p class="display-6 mb-0"><?= $summary['Finalizado'] ?></p>
          <p class="text-secondary mb-0 small">Finalizados</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-center h-100">
        <div class="card-body">
          <p class="display-6 mb-0"><?= $summary['Pendiente'] ?></p>
          <p class="text-secondary mb-0 small">Pendientes</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-center h-100">
        <div class="card-body">
          <p class="display-6 mb-0"><?= $summary['En espera'] ?></p>
          <p class="text-secondary mb-0 small">En espera</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-center h-100 border-dark">
        <div class="card-body">
          <p class="display-6 mb-0 fw-bold"><?= $summary['total'] ?></p>
          <p class="text-secondary mb-0 small">Total</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <h2 class="h5 mb-3">Acciones</h2>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <article class="card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title h4">Registrar un Incidente</h3>
          <p class="card-text text-secondary">
            Complete el formulario con los datos del solicitante y la descripción del incidente.
          </p>
          <a class="btn btn-primary mt-auto align-self-start"
            href="index.php?action=create">Registrar incidente</a>
        </div>
      </article>
    </div>
    <div class="col">
      <article class="card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title h4">Consultar Incidentes</h3>
          <p class="card-text text-secondary">
            Revise los incidentes registrados y busque
            por código, asunto o solicitante.
          </p>
          <a class="btn btn-outline-primary mt-auto align-self-start"
            href="index.php?action=list">Consultar incidentes</a>
        </div>
      </article>
    </div>
  </div>
</section>