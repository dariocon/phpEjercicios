<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wifth=device-width, initial-scale=1.0">
  <title>document</title>
</head>
<body>
    <h1>Bienvenido</h1>

    <?php
    //Validacion envío
    //$nombre="";
    //$edad=0;

    //Comprobar si los datos fueron enviados
//$edad=intval(value:$_GET["edad"])


    if ($_SERVER["REQUEST_METHOD"] == "GET") {
         //Validación de nombre
        if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
            $nombre = htmlspecialchars($_GET["nombre"]); 
            echo "Bienvenido " . htmlspecialchars($nombre);

       } else {
           echo "El campo nombre es obligatorio.<br>";
       }
    
         //Validación de edad.

        if (isset($_GET['edad']) && !empty($_GET['edad'])) {
            $edad = htmlspecialchars($_GET["edad"]); 
            if (!is_numeric($edad)) {
                echo "Por favor, introduce un número válido.";
             }else {
                $numeroEntero = intval($edad);
                if ($numeroEntero < 0 || $numeroEntero > 100) {
                    echo "La edad debe estar entre 1 y 100.";
                }else {
                    var_dump(value: $edad);
                    if ($edad>=18) {
                        echo "es mayor edad";
                    }else {
                        echo "es menor edad";
                    }
                }   

            }
        }else {
            echo "El campo edad es obligatorio.<br>";
        } 
    }/*else {
        echo "Los datos no han sido enviados.";
    } */
    
    
    //echo "Bienvenido " . htmlspecialchars($_GET["nombre"]);



   /* //Validación de nombre
    if (isset($GET['nombre']) && !empty($GET['nombre'])) {
         $nombre = htmlspecialchars($_GET["nombre"]); 
    } else {
        echo "El campo nombre es obligatorio.<br>";
    }

    //Validación de edad.


     




    if (empty($input)) {
        echo "El campo no puede estar vacío.";
        }
    if (!is_numeric($input)) {
        echo "Por favor, introduce un número válido.";
        }*/


    ?>

</body>
</html>