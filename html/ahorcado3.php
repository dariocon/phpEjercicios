<?php
session_start();

if (!isset($_SESSION["palabraAdivinar"])) {
    define('palabras', array("Casa", "Loco", "Sapo", "Roca", "Socio", "No", "Rata", "Mesa", "Ordenador", "Caja"));

    $palabraPosicion = array_rand(palabras);
    $_SESSION["palabraAdivinar"] = palabras[$palabraPosicion];
    $_SESSION["numIntentos"] = 0;
    $_SESSION["palabraDescubierta"] = [];
    $_SESSION["letraUsada"] = "";

    for ($i = 0; $i < strlen($_SESSION["palabraAdivinar"]); $i++) {
        $_SESSION["palabraDescubierta"][] = "_"; // por cada letra añado un guión.
    }
    }

$errores = [];
$fallada=null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["letra"])) {
   // if (isset($_POST["submit"])) {}
    $letra = trim($_POST["letra"]);
    if (!empty($letra)) {
        if (is_numeric($letra)) {
            $errores[] = "El valor ingresado es un número.";
        } elseif (strlen($letra) != 1) {
            $errores[] = "Introduce solo una letra.";
        } else {
            $letra = htmlspecialchars(strtoupper($letra)); 
            $palabraAdivinar = strtoupper($_SESSION["palabraAdivinar"]);
            $arrayPalabra = str_split($palabraAdivinar);
            $palabraDescubierta = $_SESSION["palabraDescubierta"];


            $fallada=true;
            for ($i = 0; $i < count($arrayPalabra); $i++) {
                if ($arrayPalabra[$i] == $letra) {
                    $palabraDescubierta[$i] = $letra;
                    $fallada=false;
                }else {
                    
                }
            }


            $_SESSION["palabraDescubierta"] = $palabraDescubierta; //para actualizar el progreso de la palabra 

            
            $sonIguales = true;
            for ($i = 0; $i < count($arrayPalabra); $i++) {
                if ($palabraDescubierta[$i] != $arrayPalabra[$i]) {
                    $sonIguales = false;
                }
            }

            if ($fallada==true) {
                $_SESSION["letraUsada"].=$letra." ";
                $_SESSION["numIntentos"]++;
                echo "Has fallado </p>";
                echo "Letras falladas: ".$_SESSION["letraUsada"]."</p>";
            }
            if ($fallada==false) {
                //$_SESSION["letraUsada"].=$letra." ";
                echo "Letras falladas: ".$_SESSION["letraUsada"]."</p>";
            }


            if ($sonIguales) {
                echo "Has acertado la palabra en " . $_SESSION["numIntentos"] . " intentos.";
                session_destroy(); 
            }
        }
    }
}


if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
}

// con este for enseño el progreso de la palabra que se está descubriendo
echo "<p>Palabra: ";
foreach ($_SESSION["palabraDescubierta"] as $letraDescubierta) {
    echo $letraDescubierta . ' '; 
}
echo "</p>";



//juego del solitario. siet ecartas de una baraja las sacas, si en alguna coincide en la segunda sacas 2 en la tercera 3 (coincide orden con numero), 
//entonces pierde
//si te toca el cinco tienes que recoger las cartas
//no pueden salir dos cartas repetidas. coger nombres de los ficheros si tengo una variable numFallo desde 0 o hasta 4, pues si el fichero se llama dasd.jpg, que es una etiqueta de imagen y cuando llega el source tengo que poner el nombre de la variable

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
    <form action="ahorcado3.php" name="formulario" method="POST">

        <label for="word">Introduce una letra:</label>
        <input type="string" id="letra" name="letra" required>  

        <input type="submit" value="Enviar">
    </form>
</body>




    
</div>
</body>
</html>


