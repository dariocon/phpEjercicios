<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla  Multiplicar</title>
</head>
<body>

    <h1>tabla de multiplicar</h1>

    <form action="ejer4.php" method="GET">
        <label for="numero">Introduce un número:</label>
        <input type="number" id="numero" name="numero" required>
        <input type="submit" value="Generar Tabla">
    </form>

    <?php
    $numero = 0;
    //$errores[]="";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['numero'])) {
           // $numero = htmlspecialchars(trim($_GET['numero']));
           if (!empty($_GET['numero']) || ($_GET['numero'])==0) {
                if (is_numeric($_GET['numero'])) {
                    $numero = htmlspecialchars(trim($_GET['numero']));
                } else {
                    $errores[]= "debes introducir un número.</h3>";
                }     
           }else {
            $errores[]="<h3>El campo está vacío.</h3>";
           }
                   
        

    }if (!empty($errores)) {
        foreach($errores as $error) {
        echo "<div class='alert alert danger'>$error</div>";
        }
    }
    }
    
    ?>

    <table border="1">

        <?php
        $multiplicador=1;
      
        if ($numero > 0) {
            
                while ($multiplicador<26) {
                    echo "<tr>";
                    echo "<td>$numero x". $multiplicador ."=" . ($numero * $multiplicador) . "</td>";  
                    echo "<td>$numero x". $multiplicador+1 ."=" . ($numero * ($multiplicador+1)) . "</td>";  
                    echo "<td>$numero x". $multiplicador+2 ."=" . ($numero * ($multiplicador+2)) . "</td>";  
                    echo "<td>$numero x". $multiplicador+3 ."=" . ($numero * ($multiplicador+3)) . "</td>";  
                    echo "<td>$numero x". $multiplicador+4 ."=" . ($numero * ($multiplicador+4)) . "</td>";  
                  
                    echo "</tr>";
                    $multiplicador+=5;
                }

            
        }
        ?>
    </table>
</body>
</html>
