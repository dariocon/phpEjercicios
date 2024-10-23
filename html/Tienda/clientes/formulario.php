<?php

    require "../header.php";

    require "bd.php";

    require_once("utility.php");

    $client= findClients($data, $_GET['id']);

?>

<main class="container">

    <div class="container mt-5">
        <h1 class="mb-4">Listado de clientes</h1>
        <form method="post">

                <input type="hidden" name="id" class="form-control" value="<?php echo $client['id']; ?>">
                <input type="hidden" name="accion" value="<?php echo $_GET['accion']; ?>">

               
            </div>
            <div class="mb-3">

                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php  echo $client['name'];?>" required>
                
            </div>
            <div class="mb-3">

                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php  echo $client['surname'];?>" required>
            </div>
            <div class="mb-3">

                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php  echo $client['email'];?>" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Género</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="male" <?php echo $client['gender'] == 'male' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="female" <?php echo $client['gender'] == 'female' ? 'selected' : ''; ?>>Femenino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Direccion</label>
                <textarea class="form-control" id="address" name="address" rows="3"
                    required><?php echo $client['address']; ?></textarea>


          
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>





    </div>





</main>

<?php
    require "../footer.php";
?>