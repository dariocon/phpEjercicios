<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número</title>
</head>
<body>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['numero']) && !empty($_GET['numero'])) {
            $numero = htmlspecialchars($_GET['numero']); 

            if (is_numeric($numero)) {
                $numeroEntero = intval($numero);
    
                if ($numeroEntero > 0) {
                    echo "<h3>$numeroEntero es positivo.</h3>";
                } elseif ($numeroEntero < 0) {
                    echo "<h3>$numeroEntero es negativo.</h3>";
                } else {
                    echo "<h3>El número es cero.</h3>";
                }
            } else {
                echo "<h3>Por favor, introduce un número válido.</h3>";
            }
        }
    }
    ?>
        <h1>Respuesta</h1>

    <div id="content">
    <form action="ejer2.php"name="formulario" method="get">
    
        Número: <input type="number" id="numero" name="numero" required>

        <input type="submit" value="Enviar">
    </form>
    </div>
</body>
</html>
