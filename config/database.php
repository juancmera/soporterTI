<?php
class Database
{
  //Parametros de conexión
  private $host = 'localhost';
  private $db_name = 'integradora';
  private $username  = 'root';
  private $password = 'demo1713';

  private $conn;

  public function getConnection()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO(
        "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
        $this->username,
        $this->password
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn->exec("set names utf8");
    } catch (PDOException $exception) {
      echo "Error de conexión: " . $exception->getMessage();
    }
    return $this->conn;
  }
}
