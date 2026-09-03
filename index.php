<?php
$action = $_GET['action'] ?? 'home';

switch ($action) {
  // Pagina de formulario de registro de tickets.
  case 'create':
    $title = 'Regsitrar ticket';
    $page = __DIR__ . '/views/pages/createTicket.php';
    $script = 'js/scripts.js'; // validaciones, solo en esta pantalla
    break;

  // Pagina lista de tickets.
  case 'list':
    $title = 'Mostrar ticket';
    $page = __DIR__ . '/views/pages/listTickets.php';
    $script = 'js/scripts.js'; // validaciones, solo en esta pantalla
    break;

  // Pantalla inicio. Es también el caso por defecto
  case 'home':
  default:
    $title = 'Inicio';
    $page = __DIR__ . '/views/pages/home.php';
    break;
}
// El layout arma el documento completo e inserta $page en su interior.
require __DIR__ . '/views/layouts/main.php';
