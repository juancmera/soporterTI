<?php
require __DIR__ . '/config/database.php';
require __DIR__ . '/models/Ticket.php';
require __DIR__ . '/controllers/TicketController.php';

// Abre conexión a al DB
$database = new Database();
$pdo = $database->connect();

//El Modelo recibe conexión
$model = new Ticket($pdo);

//EL Controlador recibe el modelo
$controller = new TicketController($model);
$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'create':
        $controller->create();
        break;

    case 'list':
        $controller->list();
        break;

    case 'home':
    default:
        $controller->home();
        break;
}

// Enruta 
$action = $_GET['action'] ?? 'home';
