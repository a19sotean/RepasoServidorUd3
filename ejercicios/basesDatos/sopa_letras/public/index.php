<?php
require_once('..\app\Config\parametros.php');
require_once('..\vendor\autoload.php');

use App\Core\Router;
use App\Controllers\DefaultController;
use App\Controllers\PalabraController;

session_start();
if (!isset($_SESSION['usuario']['perfil'])) {
    $_SESSION['usuario']['perfil'] = 'invitado';
}

$router = new Router();

// $route = explode('index.php', $_SERVER['REQUEST_URI']);
// $controller = new DefaultController;

// if($route == 'saludo') {
//     $controller = new DefaultController;
//     $controller->indexAction();
// } else if ((explode("/",$route[1])[1] == "duplica") && (preg_match("/\d{1,}/", explode("/",$route[1])[2]) == 1)) {
//     $controller->duplicaAction(explode("/",$route[1])[2]);
// } else {
//     echo "No route";
// }

$router->add(array(
    'name'=>'home',
    'path'=>'/^\/$/',
    'action'=>[PalabraController::class, 'IndexAction'],
    'auth'=>["admin", "invitado"]));

$router->add(array(
    'name'=>'addPalabra', 
    'path'=>'/^\/palabras\/add$/', 
    'action'=>[PalabraController::class, 'AddPalabraAction'],
    'auth'=>["admin"]));

$router->add(array(
    'name'=>'editPalabra',  
    'path'=>'/^\/palabras\/edit\/[0-9]{1,3}$/', 
    'action'=>[PalabraController::class, 'EditPalabraAction'],
    'auth'=>["admin"]));

$router->add(array(
    'name'=>'editPalabra',  
    'path'=>'/^\/palabras\/palabras\/edit\/[0-9]{1,3}$/', 
    'action'=>[PalabraController::class, 'EditPalabraAction'],
    'auth'=>["admin"]));

$router->add(array(
    'name'=>'deletePalabra',
    'path'=>'/^\/palabras\/delete\/[0-9]{1,3}$/', 
    'action'=>[PalabraController::class, 'DeletePalabraAction'],
    'auth'=>["admin"]));

$router->add(array(
    'name'=>'deletePalabra',
    'path'=>'/^\/palabras\/palabras\/delete\/[0-9]{1,3}$/', 
    'action'=>[PalabraController::class, 'DeletePalabraAction'],
    'auth'=>["admin"]));

$router->add(array(
    'name'=>'SearchPalabra',  
    'path'=>'/^\/palabras\/search$/', 
    'action'=>[PalabraController::class, 'SearchPalabraAction'],
    'auth'=>["admin", "invitado"]));

$router->add(array(
    'name'=>'cierraSessionPalabra',
    'path'=>'/^\/palabras\/cierra_sesion$/',
    'action'=>[PalabraController::class, 'cerrarSesionPalabraAction'],
    'auth'=>["admin"]
));
$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->match($request);

if($route) {
    if (!in_array($_SESSION['usuario']['perfil'], $route['auth'])) {
    header("location:".DIRBASEURL."/");
    } else {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
    }

} else {
    echo "No route";
}
