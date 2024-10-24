<?php
class Database {
private static $instance = null;
private $connection;
private function __construct() {

$host = 'phpejercicios-db-1';
$dbname = 'toor'; //Nombre de la base de datos
$username = 'dario'; //Nombre del usuario
$password = 'dario'; //Password del usuario

try {
$this->connection = new
PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$this->connection->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
die("Error de conexión: " . $e->getMessage());
}
}
public static function getInstance() {
if (self::$instance == null) {
self::$instance = new Database();
}
return self::$instance;
}
public function getConnection() {
return $this->connection;
}
}