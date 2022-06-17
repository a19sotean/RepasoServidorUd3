<?php
require "../vendor/autoload.php";
require "../app/Config/constantes.php";

//Enrutador
use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\UsuarioController;

session_start();

if (!isset($_SESSION['usuario']['perfil'] )) {
    $_SESSION['usuario']['perfil'] = "guest";
}

$router = new Router();

//Enrutamiento a la página de inicio
$router->add(array(
    'name'=>'home',
    'path'=>'/^\/$/',
    'action'=>[IndexController::class, 'indexAction'],  
    'auth'=>["guest"]
));

$router->add(array(
    'name'=>'logout',
    'path'=>'/^\/logout$/',
    'action'=>[UsuarioController::class, 'logoutAction'],
    'auth'=>["admin", "user"]
));

$router->add(array(
    'name'=>'signup',
    'path'=>'/^\/signup$/',
    'action'=>[UsuarioController::class, 'signupAction'],
    'auth'=>["admin", "guest"]
));

$router->add(array(
    'name'=>'opcionesAdmin',
    'path'=>'/^\/opcionesAdmin$/',
    'action'=>[UsuarioController::class, 'opcionesAdminAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'crearPregunta',
    'path'=>'/^\/crearPregunta$/',
    'action'=>[UsuarioController::class, 'crearPreguntaAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'crearEncuesta',
    'path'=>'/^\/crearEncuesta$/',
    'action'=>[UsuarioController::class, 'crearEncuestaAction'],
    'auth'=>["admin"]
));

// //Enrutamiento a la página donde el user gestiona sus bookmarks
// $router->add(array(
//     'name'=>'bookmarks',
//     'path'=>'/^\/bookmarks$/',
//     'action'=>[UsuarioController::class, 'getBookmarksAction'],
//     'auth'=>["admin", "user"]
// ));

// $router->add(array(
//     'name'=>'bookmarks',
//     'path'=>'/^\/bookmarks\?/',
//     'action'=>[UsuarioController::class, 'getBookmarksAction'],
//     'auth'=>["admin", "user"]
// ));

// //Enrutamiento a la página donde el user crea sus bookmarks
// $router->add(array(
//     'name'=>'addBookmarks',
//     'path'=>'/^\/bookmarks\/add$/',
//     'action'=>[UsuarioController::class, 'addBookmarkAction'],
//     'auth'=>["admin", "user"]
// ));

// //Enrutamiento a la página donde el user edita sus bookmarks
// $router->add(array(
//     'name'=>'editBookmarks',
//     'path'=>'/^\/bookmarks\/edit\/\d{1,3}$/',
//     'action'=>[UsuarioController::class, 'editBookmarkAction'],
//     'auth'=>["admin", "user"]
// ));

// //Enrutamiento a la página donde el user edita sus bookmarks
// $router->add(array(
//     'name'=>'deleteBookmarks',
//     'path'=>'/^\/bookmarks\/delete\/\d{1,3}$/',
//     'action'=>[UsuarioController::class, 'deleteBookmarkAction'],
//     'auth'=>["admin", "user"]
// ));

//Petición y respuesta
$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    if (!in_array($_SESSION['usuario']['perfil'] , $route['auth'])) {
        header("location:" . DIRBASEURL . "/");
    }else{
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
}else{
    echo "No route";
}