<?php
require_once("Database.php");

$conexion = Database::getInstance()->getConnection();
?>

Conexión exitosa

<?php 
    $query = "SELECT * FROM Pelicula";

    $stmt = $conexion->query($query);
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($clientes as $row) {
        /*echo "Apellido: $row[apellido], Nombre: $row[nombre], email: $row[email]";*/
        echo "Titulo: $row[titulo_p]";
     
        echo "<br>";
    }