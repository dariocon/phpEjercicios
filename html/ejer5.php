<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>random</title>
</head>
<body>


<?php

//Solo genero el número aleatorio si no me lo ha pasado por argumento
    if (!isset($_GET["numAdivinar"])) 
        $numeroAdivinar=rand(min:1, max:100); 
    else 
        $numeroAdivinar=intval($_GET["numAdivinar"]); 

        if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["num"])) {
            $num=$_GET["num"];
            if ($num== $numeroAdivinar) {
                echo "Has acertado";

            }else if ($num<$numeroAdivinar) {
                echo "Mi número es mayor";
            }else {
                echo "Mi número es menor";
            }
            
        }


    




?>






<div id="content">
    <form action="ejer5.php" name="formulario" method="GET">
        <label for="numero">Introduce un número:</label>
        <input type="number" id="num" name="num" required>  
        
        <input type="hidden" id="numAdivinar" name="numAdivinar" readonly value="<?php echo $numeroAdivinar ?>">

        <input type="submit" value="Enviar">
    </form>

    
</div>
</body>
</html>

