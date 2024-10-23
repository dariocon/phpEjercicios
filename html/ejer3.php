<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


    <?php
    $errores[]="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['usuario']) && isset($_POST['contraseña']) && !empty($_POST['contraseña']) && !empty($_POST['contraseña'])) {
            $usuario = htmlspecialchars(trim($_POST['usuario']));
            $contraseña = htmlspecialchars(trim($_POST['contraseña']));

            if ($usuario == "root" && $contraseña == "root") {
                echo "<h3>Bienvenido, $usuario</h3>";
            } else {
                $errores[]="Usuario o contraseña incorrectos.";
            }

    }if (!empty($errores)) {
        foreach($errores as $error) {
        echo "<div class='alert alert danger'>$error</div>";
        }
    }
}
    ?>
        <h1>Formulario de Login</h1>

    <div id="content">
        <form action="" method="POST">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario"required><br><br>
            
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required><br><br>
            
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>

</body>
</html>
