<?php
session_start();

if (!isset($_SESSION["numAdivinar"]) || isset($_POST["submit"])) {

        $_SESSION["numAdivinar"] = rand(1, 100); 
        $_SESSION["numIntentos"] =0;
        //$_SESSION["numIntentosRanking"] =0;

    }
        $numeroAdivinar=$_SESSION["numAdivinar"];
        $errores = []; 

        if (($_SERVER["REQUEST_METHOD"]=="POST") && (isset($_POST["num"]))) {
            if (!empty(trim($_POST["num"]))) {
                $num=$_POST["num"];
                if (!is_numeric($num)) {
                    $errores[] = "El valor ingresado no es un número.";
                } else {
                    $num = intval($num);
                    if ($num== $numeroAdivinar) {
                        $_SESSION["numIntentos"] +=1;
                        echo "Has acertado en el intento " . $_SESSION["numIntentos"] . ".";
                        //$jugador = "Anónimo"; // ?
                        //$intentos = $_SESSION["numIntentos"];
                        //$_SESSION["numIntentosRanking"] += $_SESSION["numIntentos"];
                        //"INSERT INTO jugador (jugador, intentos) VALUES ('$jugador', $intentos)";
                        //$_SESSION["numAdivinar"] = rand(1, 100); no hace falta porque se reinicia con session_destroy
                        //$_SESSION["numIntentos"] =0; no hace falta porque se reinicia con session_destroy
                        
                        session_destroy();


                    }else if ($num<$numeroAdivinar) {
                        echo "Mi número es mayor";
                        $_SESSION["numIntentos"] +=1;

                    }else {
                        echo "Mi número es menor";
                        $_SESSION["numIntentos"] +=1;
                    }
                
                }


            }else {
                $errores[]="El campo es obligatorio.";
            }
        } if (!empty($errores)) {
            foreach($errores as $error) {
            echo "<div>$error</div>";
            }
        
        }




?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>random</title>
</head>
<body>

<div id="content">
    <form action="ejer5v2.php" name="formulario" method="POST">
        <label for="numero">Introduce un número:</label>
        <input type="number" id="num" name="num" required>  
        

        <input type="submit" value="Enviar">
    </form>
</body>




    
</div>
</body>
</html>

