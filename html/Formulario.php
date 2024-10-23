<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wifth=device-width, initial-scale=1.0">

</head>
<body>
    <h1>Bienvenido</h1>

    <div id="content">
        <form action="procesarFormulario.php"name="formulario" method="get">
            
            Nombre: <input type="text" id="nombre" name="nombre" required>
            Edad: <input type="number" min="0" max="100"  id="edad" name="edad" required>

            <input type="submit" value="Enviar">
          </form>
    </div>

</body>
</html>