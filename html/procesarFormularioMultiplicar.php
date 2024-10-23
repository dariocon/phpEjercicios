<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wifth=device-width, initial-scale=1.0">
  <title>document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container mt-5">

    <?php


    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if (isset($_GET['numero']) && !empty($_GET['numero'])) {
            $numero = htmlspecialchars($_GET["numero"]); 
            $errores=[];
            if (!is_numeric($numero)) {
                $errores[] = "Por favor, introduce un número.";
            }else {
                $numeroEntero = intval($numero);
                if ($numeroEntero < 0) {
                     $errores[] = "El número debe ser positivo.";
                }
            }if (!empty($errores)) {
                foreach($errores as $error) {
                    echo "<div class='alert alert danger'>$error</div>";
                }
            }
            
            
            else {
                for ($i=0;$i<=10;$i++) {
                    $resultado=$numeroEntero*$i;
                    echo  $numeroEntero."*".$i."=".$resultado."<br>";  
                }
            }   

            }
    }
       /*}else {
            echo "El campo número es obligatorio.<br>";
        } */
    /*else {
        echo "Los datos no han sido enviados.";
    } */
    
    


    ?>


    <h1>Respuesta</h1>

    <form action="procesarFormularioMultiplicar.php"name="formulario" method="get">
         Número: <input type="number" min="0" id="numero" name="numero" required>       
    <!--Número: <input  id="numero" name="numero">-->
        <input type="submit" value="Enviar">
    </form>

</div>
 

    

    

</body>
</html>
