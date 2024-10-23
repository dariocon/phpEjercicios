<?php
session_start(); 
//juego del solitario. siet ecartas de una baraja las sacas, si en alguna coincide en la 
//segunda sacas 2 en la tercera 3 (coincide orden con numero), 
//entonces pierde
//si te toca el cinco tienes que recoger las cartas
//no pueden salir dos cartas repetidas. coger nombres de los ficheros si tengo una variable numFallo desde 0 o hasta 4, 
//pues si el fichero se llama dasd.jpg, que es una etiqueta de imagen y cuando llega el source tengo que poner el nombre de la variable

$palos = ['c', 'd', 't', 'p']; 
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

if (!isset($_SESSION['victorias'])) {
    $_SESSION['victorias'] = 0;
}
if (!isset($_SESSION['derrotas'])) {
    $_SESSION['derrotas'] = 0;
}


// genero baraja palo a palo y numero a numero, no puede salir repetida ninguna carta
if (!isset($_SESSION['baraja']) || empty($_SESSION['baraja'])) {
    
    $_SESSION['baraja'] = [];

    foreach ($palos as $palo) {
        foreach ($numeros as $numero) {
            $_SESSION['baraja'][] = ['palo' => $palo, 'valor' => $numero];
        }
    }
}

$baraja = $_SESSION['baraja'];
$finJuego = false;
$cartasSacadas = [];

// solo saco si hay minimo 7 cartas
if (isset($_POST['ronda'])) {
    if (count($baraja) >= 7) {
        for ($i = 0; $i < 7; $i++) {
            $cartaAleatoria = array_rand($baraja); // aqui la variable sería solo la posición
            $cartasSacadas[] = $baraja[$cartaAleatoria]; // se mete al array la carta de la baraja que dice la posicion aleatoria
            unset($baraja[$cartaAleatoria]); // se elimina la carta usada para que se vacíe la baraja y ademas no se puedan repetir cartas
        }
        $_SESSION['baraja'] = $baraja; // actualizo variable de sesión baraja
    } else {
        $finJuego = true; //aqui se acaba porque no quedan al menos 7 cartas
    }

    $jugadorPierde = false;
    if (!$finJuego) {
        for ($i = 0; $i < count($cartasSacadas); $i++) {
            $valor = $cartasSacadas[$i]['valor']; // Pillo el número de la carta actual
            if (($i + 1) == $valor) { // Si el número de la carta = posición de la carta, se pierde
                $jugadorPierde = true;
                break;
            }
        }

        if ($jugadorPierde) {
            $_SESSION['derrotas']++;
        } else {
            $_SESSION['victorias']++;
        }
    }
}

function mostrarCartas($cartas) {
    echo '<table>';
    echo '<tr>';
    for ($i = 1; $i <= 7; $i++) {
        echo "<th>$i</th>";
    }
    echo '</tr><tr>';

    foreach ($cartas as $carta) {
        $palo = $carta['palo'];   
        $valor = $carta['valor']; 
        $imgCarta = "cartas/{$palo}{$valor}.svg"; 

        echo "<td><img src='$imgCarta' alt='Carta' style='width: 100px; height: 150px;'></td>";
    }
    echo '</tr></table>';
}


if (isset($_POST['reiniciar_baraja'])) {
    session_destroy(); 
        $_SESSION['victorias'] = 0;
        $_SESSION['derrotas'] = 0;
        $_SESSION['baraja'] = [];

       foreach ($palos as $palo) {
           foreach ($numeros as $numero) {
               $_SESSION['baraja'][] = ['palo' => $palo, 'valor' => $numero];
           }
       }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solitario</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Solitario Inma</h1>

    <div class="tablero">
        <h2>Baraja restante: <?php echo count($_SESSION['baraja']); ?> cartas</h2>

        <?php
        if (!empty($cartasSacadas)) {
            mostrarCartas($cartasSacadas);

            if ($jugadorPierde) {
                echo "<h2>Has perdido</h2>";
            } else {
                echo "<h2>Has ganado.</h2>";
            }
        } elseif ($finJuego) {
            echo "<h2>El juego ha terminado. No hay suficientes cartas para continuar.</h2>";
        }

        echo "<h2>Partidas ganadas: {$_SESSION['victorias']}</h2>";
        echo "<h2>Partidas perdidas: {$_SESSION['derrotas']}</h2>";
        ?>

        <form method="post" action="solitario3.php">
            <input type="submit" name="ronda" value="Ronda">
        </form>

        <form method="post" action="solitario3.php">
            <input type="submit" name="reiniciar_baraja" value="Reiniciar baraja">
        </form>

    </div>


</body>
</html>
