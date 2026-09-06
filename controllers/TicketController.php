<?php
class TicketController
{
  //Recibe conexión de la DB
  private Ticket $model;

  public  function __construct(Ticket $model)
  {
    $this->model = $model;
  }

  // Pagina Inicio
  public function home(): void
  {
    $title    = 'Inicio | Mesa de ayuda';
    $scripts  = [];
    $page = __DIR__ . '/../views/pages/home.php';

    require __DIR__ . '/../views/layouts/main.php';
  }

  // Pagina registro
  public function create(): void
  {

    $title    = 'Registrar ticket | Mesa de ayuda';
    $script  = 'assets/js/validation.js';
    $page = __DIR__ . '/../views/pages/createTicket.php';

    // Listas de opciones de los selects
    $areas = [
      'Secretaría',
      'Biblioteca',
      'Docencia',
      'Laboratorios',
      'Contabilidad',
      'Decanato',
      'Bienestar estudiantil'
    ];

    $tipos = [
      'Equipo de cómputo',
      'Red e internet',
      'Correo institucional',
      'Sistema académico',
      'Impresión',
      'Software',
      'Otro'
    ];

    $prioridades = ['Baja', 'Media', 'Alta'];

    // Errores y valores previos, si el formulario fue rechazado.
    $errors = [];
    $old    = [];

    require __DIR__ . '/../views/layouts/main.php';
  }

  // Pagina tickets existentes
  public function list(): void
  {
    $tickets = $this->model->allTickets();

    $title = 'Consulta de tickets | Mesa de ayuda';
    $script  = 'assets/js/search.js';
    $page = __DIR__ . '/../views/pages/listTickets.php';

    require __DIR__ . '/../views/layouts/main.php';
  }
}
