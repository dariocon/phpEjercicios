<?php

    session_start();

    require "../header.php";  

    require "bd.php";   

    require_once("utility.php");  

    $id=validateID();

    $action=validateAction();
    
    //$_SESSION['data'] =$data;
    //$client = findClients($data, $_GET["id"]);
   /* $client = null;
    $mensaje = '';
    $accion='';*/
    
    //$client = findClients($_SESSION['data'], $id);

        // id y accion se usan con _POST los datos fueron enviados a través de POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if($action=="delete") {
            $client = deleteClient($_SESSION['data'], $id);
            $action= "alreadyDeleted";
         }else if ($action == "edit") {
            $client = editClient($_SESSION['data'], $id);
         }else if ($action== 'add') {
            $client = addClient($_SESSION['data'], $id);
         }
    
    }else {
        $client = findClients($_SESSION['data'], $_GET["id"]);
    }

    
   // $client = findClients($data, id: $_GET['id']);


?>

<main class="container">
    <div class="container mt-5">
        <?php 
            showTitle($action);
             /*if ($_GET['accion'] == 'editar') {
                echo "<h1 class='mb-4'>Edición de Cliente</h1>";
             } elseif ($_GET['accion']== 'eliminar') {
                echo "<h1 class='mb-4'>Eliminación de Cliente</h1>";

             }
        ?>

        <?php
             if ($mensaje) {
                echo "<div class='alert alert-info'>$mensaje</div>";
             }*/
        ?>
        


        <form method="post">
            <!-- Esto guarda el ?accion=editar de la url y el cliente que se ha elegido. -->
            <input type="hidden" name="id" class="form-control" value="<?php echo $client['id']; ?>">
            <!-- <input type="hidden" name="accion" value="<?php echo isset($_GET['action']) ? $_GET['action'] : ''; ?>"> -->


            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="<?php echo $client['name']; ?>" 
                       <?php readOnlyOrNot($action); ?> required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="surname" name="surname" 
                       value="<?php echo $client['surname']; ?>" 
                       <?php readOnlyOrNot($action); ?> required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="<?php echo $client['email']; ?>" 
                       <?php readOnlyOrNot($action); ?> required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Género</label>
                <select id="gender" name="gender" class="form-select" <?php readOnlyOrNot($action); ?> required>
                    <option value="masculino" <?php if ($client['gender'] == 'male') echo 'selected'; ?>>Masculino</option>
                    <option value="femenino" <?php if ($client['gender'] == 'female') echo 'selected'; ?>>Femenino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <textarea class="form-control" id="address" name="address" rows="3" 
                          required <?php readOnlyOrNot($action); ?> required>
                          <?php echo $client['address']; ?></textarea>
            </div>

            <?php
                showButton($action);

                
              // if(isset($_POST["buttom-delete"])) {
                //$client_id = $_POST[""]; recuperar cliente

               //}
               
           /* if ($action == 'edit') {
                echo "<button type='submit' class='btn btn-primary'>Guardar cambios</button>";
            } elseif ($action == 'delete') {
                echo "<button type='submit' class='btn btn-danger'>Eliminar cliente</button>";
                
            }*/
            ?>

        </form>
    </div>
</main>

<?php
    require "../footer.php";  
?>
