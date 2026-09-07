<section class="py-4 text-center">
  <h1 class="h3">Consulta de Incidentes</h1>
  <p class="lead text-secondary mb-0">Listado de incidentes registrados en el sistema.</p>
</section>

<section class="mb-4" aria-labelledby="tituloBusqueda">
  <h2 id="tituloBusqueda" class="visually-hidden">Buscar</h2>
</section>

<section div class="row g-4">

  <div class="col-lg-12" aria-labelledby="tituloListado">
    <div class="row g-3">
      <div class="col-md-5">
        <h2 id="tituloListado" class="h5 mb-3">Incidentes generados</h2>
      </div>

      <div class="col-md-7">
        <form class="search" method="GET" action="index.php" id="formBusqueda" aria-label="Buscra ticket">
          <input type="hidden" name="action" value="list">
          <div class="input-group">
            <input type="search" id="busqueda" name="busqueda"
              class="form-control"
              placeholder="Buscar por código, asunto o solicitante" value="<?php htmlspecialchars($busqueda ?? '') ?>" />
            <button type="submit" class="btn btn-primary" id="limpiarBusqueda">Buscar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle" id="tablaTickets">
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
          <?php if (!empty($tickets)): ?>
            <?php foreach ($tickets as $ticket): ?>
              <tr>
                <th scope="row">I-<?= str_pad($ticket['id'], 4, '0', STR_PAD_LEFT) ?></th>
                <td><?= htmlspecialchars($ticket['asunto']) ?></td>
                <td><?= htmlspecialchars($ticket['nombre']) ?></td>
                <td><?= htmlspecialchars($ticket['tipo_incidencia']) ?></td>
                <?php
                $color_p = match ($ticket['prioridad']) {
                  'Alta' => 'danger',
                  'Media' => 'warning',
                  default => 'secondary'
                };
                ?>
                <td><span class="badge bg-<?= $color_p ?>-subtle text-<?= $color_p ?>-emphasis rounded-pill"><?= htmlspecialchars($ticket['prioridad']) ?></span></td>

                <?php
                $color_e = match ($ticket['estado']) {
                  'Finalizado' => 'success',
                  'En espera'  => 'primary',
                  default      => 'secondary',
                };
                ?>
                <td><span class="badge bg-<?= $color_e ?>-subtle text-<?= $color_e ?>-emphasis rounded-pill"><?= htmlspecialchars($ticket['estado']) ?></span></td>
                <td><time datetime="<?= date('Y-m-d', strtotime($ticket['fecha_registro'])) ?>">
                  <?= date('d/m/Y', strtotime($ticket['fecha_registro'])) ?></td>
                <td class="text-end text-nowrap">
                  <a class="btn btn-sm btn-outline-secondary" href="#"><i class="bi bi-eye-fill"></i></a>
                  <a class="btn btn-sm btn-outline-danger" href="#"><i class="bi bi-trash3-fill"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="alert alert-info d-none" id="sinResultados"  role="status"> No se encontraron tickets que coincidan con la búsqueda.
            </div>
          <?php endif; ?>

        </tbody>
      </table>
    </div>

    <p class="text-secondary small mt-2" id="contadorResultados" aria-live="polite"></p>

  </div>

</section>