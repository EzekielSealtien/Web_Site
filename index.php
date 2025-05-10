<?php
session_start();
define("URI", "http://localhost/dashboard/projetPDO/");
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

include_once ROOT . "autoload.php";

$params = explode("/", $_GET["p"]);
// var_dump($params);
$nomControllers = ucfirst($params[0]);
$action = isset($params[1]) ? $params[1] : 'index';

if (file_exists(ROOT . "controllers/$nomControllers.php")) {
    $controllers = new $nomControllers();
    if (method_exists($controllers, $action)) {
        // [telephones,supprimer,12]
        array_shift($params);
        // [supprimer,12]
        array_shift($params);
        // [12]
        call_user_func_array([$controllers, $action], $params);

    } else {
        header("Location: " . URI . "telephones/index");
    }

} else {
    header("Location: " . URI . "telephones/index");
}


?>