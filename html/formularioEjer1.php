<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wifth=device-width, initial-scale=1.0">

</head>
<body>

    <?php

    
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $errores=[];
            $nombreMayusculas = "";
            $mayorMenor = ""; 
            $tuEmail="";
            $comentarios="";
            $paises="";
            $hobbies="";
            //Validación de nombre
           if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
               $nombre = htmlspecialchars($_GET["nombre"]); 
               $nombreMayusculas = strtoupper($nombre); 
               if (!preg_match("/^[a-zA-Z]+$/", $nombreMayusculas)) {
                $errores[]="No es alfabético.";
               }
           }

   
         /* } else {
              $errores[]=  "El campo nombre es obligatorio.<br>";
          }*/
           
            //Validación de edad.
   
           if (isset($_GET['edad']) && !empty($_GET['edad'])) {
               $edad = htmlspecialchars($_GET["edad"]); 
               if (!is_numeric($edad)) {
                    $errores[] = "Por favor, introduce un número.<br>";
                }else {
                   $edadEntero = intval($edad);
                   if ($edadEntero < 0 || $edadEntero > 100) {
                        $errores[] =  "La edad debe estar entre 1 y 100.<br>";
                   }else {
                        if ($edadEntero >= 18) {
                            $mayorMenor = "eres mayor de edad";
                        } else {
                            $mayorMenor = "eres menor de edad";
                    }
                   }   
   
               }
           }
           /*}else {
                $errores[]= "El campo edad es obligatorio.<br>";
           }*/
          
            //Validación de email.
             if (isset($_GET['email']) && !empty($_GET['email'])) {
                $email = htmlspecialchars($_GET["email"]); 
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores[]="Lo introducido no tiene formato email.";
                }else {
                    $tuEmail="Tu email es".$email;

                }
             }
    
            /* } else {
                $errores[] = "El campo email es obligatorio.<br>";
             }*/
           
             if (isset($_GET['hobby[]']) && !empty($_GET['hobby[]'])) {
                $aux= $_GET["hobby"];
                foreach($aux as $hobby) {
                    echo $hobby . "<br>";
                }

    
            }if (isset($_GET['pais']) && !empty($_GET['pais'])) {
                $comentarios = htmlspecialchars($_GET["pais"]); 

        
    
            }
             
            if (!empty($errores)) {
                foreach($errores as $error) {
                echo "<div class='alert alert danger'>$error</div>";
                }
            }else {
                echo "<h3>Resultado:</h3>";
                if (!empty($nombreMayusculas)) {
                    echo $nombreMayusculas . ", ";
                }
                if (!empty($mayorMenor)) {
                    echo $mayorMenor . ".<br>";
                }if (!empty($tuEmail)) {
                    echo "Tu email es".$tuEmail . ".<br>";
                }if (!empty($comentarios)) {
                    echo $comentarios . ".<br>";
                }if (!empty($paises)) {
                    echo "Tu país es".$paises . ".<br>";
                }if (isset($_GET['hobby']) && !empty($_GET['hobby'])) {
                    $aux= $_GET["hobby"];
                    foreach($aux as $hobby) {
                        echo "Tus hobbies son: ".$hobby . "<br>";
                    }
                }if (isset($_GET['genero']) && !empty($_GET['genero'])) {
                    $genero = htmlspecialchars($_GET["genero"]); 
                    echo $genero."<br>";
                }if (isset($_GET['comentario']) && !empty($_GET['comentario'])) {
                    $comentario = htmlspecialchars($_GET["comentario"]); 
                    echo $comentario;
    
            
    
            


            }
}
        }
    ?>



    

    <div id="content">
    <h1>Bienvenido</h1>
        <form action="formularioEjer1.php"name="formulario" method="get">
            
            Nombre: <input type="text" id="nombre" name="nombre" required><br>
            Edad: <input type="number" min="0" max="100"  id="edad" name="edad" required><br>
            Correo electrónico: <input type="text" id="email" name="email" required><br>
            Comentario: <br><textarea name="comentario"></textarea><br>
            
            Género: 
    
            <input type="radio" id="mujer" name="genero" value="mujer" required />
            <label for="eleccion1">Mujer</label>

            <input type="radio" id="hombre" name="genero" value="hombre" required/>
            <label for="eleccion2">Hombre</label><br>

            <input type="radio" id="otro" name="genero" value="otro" required />
            <label for="eleccion3">Otro</label><br>


            País:     
            <select name="pais" required>
                <option value="España"  >España</option>
                <option value="México" >Nepal</option>
                <option value="Argentina" >Madagascar</option>
            </select><br>
            Hobbies:
            <input type="checkbox" name="hobby[]" value="Leer" > Leer
            <input type="checkbox" name="hobby[]" value="Viajar" > Viajar
            <input type="checkbox" name="hobby[]" value="Deporte" > Deporte
            <input type="checkbox" name="hobby[]" value="Cerveza" > Cerveza
            <input type="checkbox" name="hobby[]" value="Videojuegos" > Videojuegos<br>
            <input type="submit" value="Enviar">
    </form>
    </div> 
    <!--<input type="radio" id="genero" name="genero" required>
    <input type="radio" id="genero" name="genero" required>-->
</body>
</html>