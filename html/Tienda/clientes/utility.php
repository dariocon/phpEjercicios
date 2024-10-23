<?php

function findClients($data, $id) {
    foreach ($data as $client) {
        if ($client['id'] == $id) {
            return $client; 
        }
    }
    echo "<script>window.location.href = \ '/Tienda/clientes/error.php?msg=El cliente no es valido\'</script>";
    exit();
}


function validateID() {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        return intval($_GET['id']);
    }else {
        echo "<script>window.location.href = \ '/Tienda/clientes/error.php?msg=El id no es valido\'</script>";
        exit();
    }


}

function validateAction() {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        $action = htmlspecialchars($_GET['action']); // Sanitizar la entrada
        if ($action == "show" || $action == "delete" || $action == "edit") {
            return $action;
        }
    } 
    // Redirigir a la pagina de error con el correspondiente mensaje
    echo "<script>window.location.href = \"/Tienda/clientes/error.php?msg=La accion " . htmlspecialchars($action ?? 'no definida') . " no es válida.\";</script>";
    exit();
}



function showTitle($action) {
    
    //if ($_GET['accion'] == 'editar') {
    switch ($action) {
        case "show":
            echo "<h1 class='mb-4'>Mostrando cliente</h1>";
            break;
        case "delete":
            echo "<h1 class='mb-4'>Eliminando cliente</h1>";
            break;
        case "alreadyDeleted":
            echo "<h1 class='mb-4'>Cliente eliminado</h1>";
            break;
        case "edit":
            echo "<h1 class='mb-4'>Editando cliente</h1>";
            break;
    }
}
    
function readOnlyOrNot($action) {

    switch ($action) {
        case "show":
            echo " disabled ";
            break;
        case "delete":
            echo " disabled ";
            break;
        case "alreadyDeleted":
            echo " disabled ";
            break;
        

    }

}

function show ($data, $id) {


}    


function deleteClient(&$data, $id) {


    foreach ($data as $key => $client) {
        if ($client['id'] == $id) {
            unset($data[$key]);             
                return $client;
        }
    
}
    //echo "<script>window.location.href = \ '/Tienda/clientes/error.php?msg=El cliente no existe\'</script>";
    echo "<script>window.location.href = '/Tienda/clientes/error.php?msg=El cliente no existe';</script>";
    exit();
}




function editClient(&$data, $id) {
    //si es por post, EDITA
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        $client = null;
        foreach ($data as &$clientReferencia) {  
            if ($clientReferencia['id'] == $id) {
                $client = &$clientReferencia;  
                $client['name'] = $_POST['name'];
                $client['surname'] = $_POST['surname'];
                $client['email'] = $_POST['email'];
                $client['gender'] = $_POST['gender'];
                $client['address'] = $_POST['address'];
                return $client;  
            }
    }

    }

    // Si no se encuentra el cliente, redirigir a la página de error
    echo "<script>window.location.href = '/Tienda/clientes/error.php?msg=El cliente no existe';</script>";
    exit();
}


/*function addClient(&$data) {
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        $client = null;
                $client = &$clientReferencia;  
                $client['name'] = $_POST['name'];
                $client['surname'] = $_POST['surname'];
                $client['email'] = $_POST['email'];
                $client['gender'] = $_POST['gender'];
                $client['address'] = $_POST['address'];
                return $client;  
            
    }

    }

    // Si no se encuentra el cliente, redirigir a la página de error
    echo "<script>window.location.href = '/Tienda/clientes/error.php?msg=El cliente no existe';</script>";
    exit();
*/




function showButton($action) {
    switch ($action) {

        case 'show':
            echo "<a href ='/Tienda/clientes/index.php' class='btn btn-primary'>Volver</a>";
            break;
        case 'alreadyDeleted':
            echo "<a href ='/Tienda/clientes/index.php' class='btn btn-primary'>El cliente ha sido borrado</a>";
            break;
        case 'delete':
            echo "<input type='submit' value='Confirmar borrado' id='submit' name='submit' class='btn btn-danger me-2'>";
           // echo "<button name=buttom-delete type=\"submit\" class=\"btn btn-danger\">Confirma que deseas borrar el cliente.</a>";
            break;
        case 'edit':
            echo "<input type='submit' value='Guardar' id='submit' name='submit' class='btn btn-danger me-2'>";
            echo "<a href ='/Tienda/clientes/index.php' class='btn btn-primary'>El cliente ha sido editado</a>";
            break;


    }

}
