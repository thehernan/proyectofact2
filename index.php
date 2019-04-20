






<?php

/////CONTROLLADORES
session_start();

    
    


?>


<?php

/// BaseURL Parameters
include './config/parameters.php';


?>




<?php

//Conexion
require_once './config/DataSource.php';
?>


<?php

//autoload
require_once './autoload.php';
?>   



<?php

function error() {
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controller = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {

    $nombre_controller = controller_default;
} else {

    error();
    exit();
}

if (class_exists($nombre_controller)) {
    $controlador = new $nombre_controller();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {

        error();
    }
} else {
    error();
}
?>












