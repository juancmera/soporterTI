<?php
class Tickets {
  private $conn;

  public function __construct($db) {
    $this->conn = $db;
  }

  //Guarda nuevo ticket
  public function saveTicket(array $data): bool {
    
    $query ='INSERT INTO tickets (nombre, correo, extension, area, asunto, tipo_incidencia, prioridad, descripcion) 
            VALUES (:nombre, :correo, :extension, :area, :asunto, :tipo_incidencia, :prioridad, :descripcion)';

    $stmt = $this->conn->prepare($query);

    return $stmt->execute(
      [
        ':nombre' => $data['nombre'],
        ':correo' => $data['correo'],
        ':extension' => $data['extension'],
        ':area' => $data['area'],
        ':asunto' => $data['asunto'],
        ':tipo_incidencia' => $data['tipo_incidencia'],
        ':prioridad' => $data['prioridad'],
        ':descripcion' => $data['descripcion'],
      ]
    );

  }

  // carga todos los tickets
  public function tickets() {
    $query = 'SELECT id, nombre, correo, extension, area, asunto, tipo_incidencia, prioridad, estado, fecha_registro FROM tickets ORDER BY fecha_registro DESC';

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //Dashboard tickets
  public function summary(): array {
    $summary = [
      'Pendiente'  => 0,
      'En espera'  => 0,
      'Finalizado' => 0,
      'total'      => 0,
    ];
    
    $query = 'SELECT estado, COUNT(*) AS cantidad
      FROM tickets
      GROUP BY estado';

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    foreach ($stmt as $row) {
        $summary[$row['estado']] = (int) $row['cantidad'];
        $summary['total'] += (int) $row['cantidad'];
    }

    return $summary;
  }

}
