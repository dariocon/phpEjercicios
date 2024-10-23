<?php
session_start();

if (!isset($_SESSION["baraja"])) {
    define("cartas", array());
}


//juego del solitario. siet ecartas de una baraja las sacas, si en alguna coincide en la segunda sacas 2 en la tercera 3 (coincide orden con numero), 
//entonces pierde
//si te toca el cinco tienes que recoger las cartas
//no pueden salir dos cartas repetidas. coger nombres de los ficheros si tengo una variable numFallo desde 0 o hasta 4, 
//pues si el fichero se llama dasd.jpg, que es una etiqueta de imagen y cuando llega el source tengo que poner el nombre de la variable



?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>solitario</title>
</head>
<body>

<div id="content">
    <form action="solitario.php" name="formulario" method="POST">

        <label for="juega">Juega de nuevo:</label>
        <input type="buttom" id="juega-otra" name="juega-otra" required>  
    </form>
</body>




    
</div>
</body>
</html>