<?php
require_once 'controllers/TicketController.php';
$controller = new TicketController();

$action = $_GET['action'] ?? 'home';

switch ($action) {
  case "create":
    $controller->saveTicket();
    break;
  case "list":
    $controller->listTicket();
    break;
  case "home":
  default:
    $controller->home();
    break;
}
