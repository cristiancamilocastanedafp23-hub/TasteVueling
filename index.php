<?php
// Incluimos el fichero de configuración con los parámetros
include_once("config/parameters.php");

// Sesion
session_start();

// Funcion de enseñar el error
function showError($code, $message)
{
    http_response_code($code);
    $errorCode = $code;
    $errorMessage = $message;
    $view = "mvc/views/error.php";
    include_once "mvc/views/main.php";
    exit;
}

// Redirige al controller por defecto si no hay en la URL
if (!isset($_GET['controller'])) {
    header("Location: " . url . "?controller=" . default_controller);
    exit;
}

// Leemos el nombre del controlador de la URL
// El que reciba home,carta,usuario,etc
$controllerParam = $_GET['controller'];
// Pegamos el controller que reciba 
$nombre_controller = $controllerParam . "Controller";

// Ruta para buscar dentro de la carpeta mvc/
$controllerFile = "mvc/controllers/" . $nombre_controller . ".php";

// Da un error en caso de no existir
if (!file_exists($controllerFile)) {
    showError(404, "No existe el controller " . $nombre_controller);
}

// Carga el archivo
include_once $controllerFile;

// Error de que el fichero existe pero no con el nombre correcto
if (!class_exists($nombre_controller)) {
    showError(500, "El fichero existe pero no contiene la clase " . $nombre_controller);
}

// Crea el objeto
$controller = new $nombre_controller();

// Decide la accion
$action = default_action;
if (isset($_GET['action']) && $_GET['action'] !== '') {
    $action = $_GET['action'];
}

// Indica que sea public y exista
if (!is_callable([$controller, $action])) {
    showError(404, "No existe la action \"" . $action . "\" en " . $nombre_controller);
}

// Ejecuta
$controller->$action();