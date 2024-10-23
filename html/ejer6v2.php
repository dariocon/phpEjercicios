<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anagramas</title>
</head>
<body>
    

<?php
$errores = [];
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    if (isset($_GET['palabra1']) && isset($_GET['palabra2']) && !empty($_GET['palabra1']) && !empty($_GET['palabra2'])){

            $palabra1 = htmlspecialchars(trim($_GET["palabra1"])); 
            $palabra1Mayusculas = strtoupper($palabra1); 
            $palabra2 = htmlspecialchars(trim($_GET["palabra2"])); 
            $palabra2Mayusculas = strtoupper($palabra2); 
    
            if ((!preg_match("/^[A-Z]+$/", $palabra1Mayusculas)) || (!preg_match("/^[A-Z]+$/", $palabra2Mayusculas))) {
                $errores[] = "No es alfabético.";
            } else {
                if (strlen($palabra1Mayusculas) != strlen($palabra2Mayusculas)) {
                    $errores[] = "Las palabras tienen longitudes diferentes.";
                } else {
                    $arrayPalabra1Mayusculas = str_split($palabra1Mayusculas);
                    $arrayPalabra2Mayusculas = str_split($palabra2Mayusculas);
                   // $longitud= count($arrayPalabra1Mayusculas);
                    
                    $coincidencia = 0;
                    for ($i = 0; $i < count($arrayPalabra1Mayusculas); $i++) {
                        if ($arrayPalabra1Mayusculas[$i]!="*") {
                            for ($j = 0; $j < count($arrayPalabra2Mayusculas); $j++) {
                                if ($arrayPalabra2Mayusculas[$j]!="*") {
                                    if ($arrayPalabra1Mayusculas[$i] == $arrayPalabra2Mayusculas[$j]) {
                                        $coincidencia++;
                                       // $arrayPalabra1Mayusculas[$i]="*";
                                        $arrayPalabra2Mayusculas[$j]="*";
        
                                        //unset($arrayPalabra1Mayusculas[$i]);
                                        //unset($arrayPalabra2Mayusculas[$j]);
                                        break; 
                                    }
                                }


                        }
                        
                    }

                }if ($coincidencia == count($arrayPalabra1Mayusculas)) {
                    echo "Es anagrama.";
                } else {
                    echo "No es anagrama.";
                }
            }
        }



    /*}else {
        $errores[] = "Los campos son obligatorios.<br>";
    }*/



    if (!empty($errores)) {
        foreach($errores as $error) {
        echo "<div class='alert alert danger'>$error</div>";
        }
    }
}

}






/*     $coincidencia=0;
                    $repetidas="";
                    for ($i=0; $i<strlen($palabra1Mayusculas);$i++) {
                        for ($j=0; $j<strlen($palabra2Mayusculas);$j++) {
                            if ($palabra1Mayusculas[$i]==$palabra2Mayusculas[$j] && $palabra1Mayusculas[$j]!=$repetida){
                                $coincidencia++; 
                                //$repetida .= $palabra2Mayusculas[$j]; //Con esto concateno.
                                break;
                            }$usada = false;
                            for ($h = 0; $h < strlen($repetidas); $h++) {
                                 if ($palabra1Mayusculas[$j]==$repetidas[h]) {
                                    $usada=true;
                                    }
                    }

                    }
                    if ($coincidencia==strlen($palabra1Mayusculas)) {
                        echo "Es anagrama.";
                    }else {
                        echo "No es anagrama.";
                    }
    */
?>







<h1>Anagramas</h1>

<form method="GET" action="ejer6v2.php">
    <label for="palabra1">Primera palabra:</label>
    <input type="text" id="palabra1" name="palabra1" required><br><br>

    <label for="palabra2">Segunda palabra:</label>
    <input type="text" id="palabra2" name="palabra2" required><br><br>

    <input type="submit" value="Comprobar">
</form>



</body>
</html>