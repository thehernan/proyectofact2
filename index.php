









<?php
//session_name();
//session_start(['read_and_close' => true]);
/// BaseURL Parameters
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("./libs/password_compatibility_library.php");
}



session_start();

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

/////CONTROLLADORES
//session_start() ;



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












