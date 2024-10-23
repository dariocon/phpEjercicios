<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
</head>
<body>

    <h1>Generar Tabla de Multiplicar</h1>

    <form action="" method="POST">
        <label for="numero">Introduce un número:</label>
        <input type="number" id="numero" name="numero" required>
        <input type="submit" value="Generar Tabla">
    </form>

    <?php
    // Inicializar la variable para el número
    $numero = 0;

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el número introducido
        $numero = htmlspecialchars(trim($_POST['numero']));
    }
    ?>

    <h2>Tabla de multiplicar de <?php echo $numero; ?> hasta el 25</h2>
    <table border="1">
        <tr>
            <th>Multiplicador</th>
            <th>Resultado</th>
        </tr>
        <?php
        // Generar la tabla de multiplicar solo si hay un número
        if ($numero > 0) {
            for ($i = 1; $i <= 25; $i++) {
                echo "<tr>";
                echo "<td>$numero x $i</td>";
                echo "<td>" . ($numero * $i) . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

</body>
</html>
