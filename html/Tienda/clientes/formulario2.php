<?php
    require "../header.php";     
    require "bd.php";             
    require_once("utility.php");  

    $client = findClients($data, $_GET['id']);
?>

<main class="container">
    <div class="container mt-5">
        <h1 class="mb-4">Formulario de Cliente</h1>
        
        <form method="post">
            
            <input type="hidden" name="accion" value="<?php echo $_GET['accion']; ?>">
            <input type="hidden" name="id" class="form-control" value="<?php echo $client['id']; ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $client['name']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $client['surname']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $client['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Género</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="masculino" <?php echo $client['gender'] == 'masculino' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="femenino" <?php echo $client['gender'] == 'femenino' ? 'selected' : ''; ?>>Femenino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <textarea class="form-control" id="address" name="address" rows="3" required><?php echo $client['address']; ?></textarea>
            </div>

            <!-- Botón dinámico: Guardar cambios si es edición, Eliminar cliente si es eliminación -->
            <?php if ($_GET['accion'] == 'editar'): ?>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <?php elseif ($_GET['accion'] == 'eliminar'): ?>
                <button type="submit" class="btn btn-danger">Eliminar cliente</button>
            <?php endif; ?>
        </form>
    </div>
</main>

<?php
    require "../footer.php";  // Pie de página
?>
