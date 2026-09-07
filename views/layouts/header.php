<?php
$currentPage = $_GET['action'] ?? 'home';

function navClass(string $page, string $current): string
{ return $page === $current ? 'nav-link active' : 'nav-link'; }

function navCurrent(string $page, string $current): string
{ return $page === $current ? 'aria-current="page"' : ''; }
?>
<header>
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark"
    aria-label="Navegación principal">
    <div class="container">

      <a class="navbar-brand" href="index.php">Mesa de ayuda</a>

      <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#mainNav"
        aria-controls="mainNav" aria-expanded="false"
        aria-label="Alternar navegación">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="<?= navClass('home', $currentPage) ?>"
              <?= navCurrent('home', $currentPage) ?>
              href="index.php?action=home">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="<?= navClass('create', $currentPage) ?>"
              <?= navCurrent('create', $currentPage) ?>
              href="index.php?action=create">Registro de Incidente</a>
          </li>
          <li class="nav-item">
            <a class="<?= navClass('list', $currentPage) ?>"
              <?= navCurrent('list', $currentPage) ?>
              href="index.php?action=list">Consulta de Incidentes</a>
          </li>

          <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
            <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white opacity-25"></div>
            <hr class="d-lg-none my-2 text-white opacity-25">
          </li>

          <li class="nav-item">
            <button type="button" id="themeToggle"
              class="btn btn-link nav-link py-2 px-0 px-lg-2"
              aria-label="Cambiar tema">
              <i class="bi bi-moon-stars" id="themeIcon" aria-hidden="true"></i>
            </button>
          </li>
        </ul>
      </div>

    </div>
  </nav>
</header>