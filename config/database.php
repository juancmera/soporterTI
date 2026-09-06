<?php

class Database
{
  // --- Parámetros de conexión ---
  private const HOST     = 'localhost';
  private const NAME     = 'integradora';
  private const USER     = 'root';
  private const PASSWORD = 'demo1713';          // XAMPP instala root sin contraseña
  private const CHARSET  = 'utf8mb4';

  // Guarda la conexión ya abierta.
  private ?PDO $connection = null;

  public function connect(): PDO
  {
    // Si ya existe, se reutiliza.
    if ($this->connection !== null) {
      return $this->connection;
    }

    $dsn = sprintf(
      'mysql:host=%s;dbname=%s;charset=%s',
      self::HOST,
      self::NAME,
      self::CHARSET
    );

    $options = [

      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
      $this->connection = new PDO($dsn, self::USER, self::PASSWORD, $options);
    } catch (PDOException $e) {

      error_log('Error de conexión: ' . $e->getMessage());

      throw new RuntimeException(
        'No fue posible conectar con la base de datos.'
      );
    }

    return $this->connection;
  }
}
