<?php
session_start();
require "../header.php";
require "bd.php";  

?>  
<main class="container">
    <div class="container mt-5">
        <table class="table caption-top">
            <caption>List of users</caption>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_SESSION['data'] as $dni => $cliente) {
                    echo "<tr>
                            <td>{$cliente['id']}</td>
                            <td>{$cliente['name']}</td>
                            <td>{$cliente['surname']}</td>
                            <td>
                                <a href='formulario3.php?action=show&id={$cliente['id']}' class='btn btn-danger btn-sm'>Ver más</a>
                                <a href='formulario3.php?action=edit&id={$cliente['id']}' class='btn btn-primary btn-sm'>Editar</a>
                                <a href='formulario3.php?action=delete&id={$cliente['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php
require "../footer.php";
?>

