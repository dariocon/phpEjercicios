<?php
session_start();

if (!isset($_SESSION["letra"])) { //if (!isset($_SESSION["letra"]) || isset($_POST["submit"])) {

//array diez palabras
       // const palabrasAdivinar = ["Casa", "Loco", "Sapo", "Roca", "Socio", "No", "Rata", "Mesa", "Ordenador"]; 
        define('palabras', array("Casa", "Loco", "Sapo", "Roca", "Socio", "No", "Rata", "Mesa", "Ordenador", "Caja"));
        $_SESSION["numIntentos"] =0;
        //$_SESSION["numIntentosRanking"] =0;

    }
        //$palabraAdivinar=$_SESSION["palabras"];
        $errores = []; 

        if (($_SERVER["REQUEST_METHOD"]=="POST") && (isset($_POST["letra"]))) {
            if (!empty(trim($_POST["letra"]))) {
                $letra=$_POST["letra"];
                if (is_numeric($letra)) {
                    $errores[] = "El valor ingresado es un número.";
                } else {
                    
                    $letra = htmlspecialchars($letra);
                    $_SESSION["palabraAdivinar"] = array_rand(palabras, 10); 
                    $palabraElegida=$_SESSION["palabraAdivinar"];
                    $arrayPalabra = str_split($palabraElegida);
                    $palabraDescubierta=[count($arrayPalabra)];
                    for ($i = 0; $i < count($arrayPalabra); $i++) {

                            if ($arrayPalabra[$i] == $letra) {
                                if ($palabraDescubierta[$i]!=null) {
                                    $palabraDescubierta[$i]=$letra;
                                    $letra=null;
                                }

                            }
                        }
                    }

                    if ($palabraDescubierta== $arrayPalabra) {
                        $_SESSION["numIntentos"] +=1;
                        echo "Has acertado en el intento " . $_SESSION["numIntentos"] . ".";
                        //$jugador = "Anónimo"; // ?
                        //$intentos = $_SESSION["numIntentos"];
                        //$_SESSION["numIntentosRanking"] += $_SESSION["numIntentos"];
                        //"INSERT INTO jugador (jugador, intentos) VALUES ('$jugador', $intentos)";
                        //$_SESSION["numAdivinar"] = rand(1, 100); no hace falta porque se reinicia con session_destroy
                        //$_SESSION["numIntentos"] =0; no hace falta porque se reinicia con session_destroy
                        
                        session_destroy();


                    }
                
                }

            }

/* <label for="word">Introduce una palabra:</label>
        <input type="string" id="palabra" name="palabra" required> */


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
    <form action="ahorcado.php" name="formulario" method="POST">

        <label for="word">Introduce una letra:</label>
        <input type="string" id="letra" name="letra" required>  

        <input type="submit" value="Enviar">
    </form>
</body>




    
</div>
</body>
</html>

