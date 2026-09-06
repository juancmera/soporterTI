<?php
class Ticket
{

  //Recibe conexión de la DB
  private PDO $pdo;

  public  function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }
  // Carga todos los tickets ordenados
  public function allTickets(): array
  {

    $sql = 'SELECT id, nombre, correo, extension, area, asunto,
                   tipo_incidencia, prioridad, estado, fecha_registro
            FROM tickets
            ORDER BY fecha_registro DESC';

    return $this->pdo->query($sql)->fetchAll();
  }

  // Diseño de los badgets según el tipo
  public static function priorityClass(string $prioridad): string
  {
    return match ($prioridad) {
      'Alta'  => 'danger',
      'Media' => 'warning',
      default => 'secondary',
    };
  }

  public static function statusClass(string $estado): string
  {
    return match ($estado) {
      'Finalizado' => 'success',
      'En espera'  => 'primary',
      default      => 'secondary',
    };
  }
}
