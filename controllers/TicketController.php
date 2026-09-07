<?php

  require_once 'config/database.php';
  require_once 'models/Ticket.php';

  class TicketController {
    private $model;

    public function __construct() {
      $database = new Database();
      $db = $database->getConnection();
      $this->model = new Tickets($db);
    }

    //Estructura pagina completa
    private function renderView($viewName, $data = []) {
      //Extrae el arreglo $data en variables
      extract($data);

      //Carga inicio
      require_once 'views/layouts/header.php';
      // Abre el contenedor principal e inyecta la vista dinámica
      echo "<main class='container flex-grow-1 py-4'>";
      require_once 'views/pages/' . $viewName . '.php';
      echo "</main>";
      //Carga el cierre del HTML
      require_once 'views/layouts/footer.php';

      require_once 'views/layouts/main.php';
    }

    public function home(): void {
      $data = [
        'title' => 'inicio',
        'summary' => $this->model->summary()
      ];
      $this->renderView('home', $data);
    }

    public function saveTicket() {
      $data = ['title' => 'Registro'];

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ticketData = [
            'nombre' => $_POST['nombre'] ?? '',
            'correo' => $_POST['correo'] ?? '',
            'extension' => $_POST['extension'] ?? '',
            'area' => $_POST['area'] ?? '',
            'asunto' => $_POST['asunto'] ?? '',
            'tipo_incidencia' => $_POST['tipo_incidencia'] ?? '',
            'prioridad' => $_POST['prioridad'] ?? '',
            'descripcion' => $_POST['descripcion'] ?? ''
        ];
      
        if (!empty($ticketData)) {
          if ($this->model->saveTicket($ticketData)) {
            header('Location: index.php?action=list');
            exit;
          } else {
            echo "Error al registrar el usuario.";
          }
         } else {
            echo "Por favor, completa todos los campos.";
            $this->renderView('listTicket', $data);
        }
      }
      //carga pagina 
      $this->renderView('createTicket', $data);
    }

    public function listTicket() {
      $data = [
        'tickets' => $this->model->tickets()
      ];
    //carga pagina
    $this->renderView('listTickets', $data);
    }
  }