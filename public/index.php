<?php

use App\Core\NoAuthException;

session_start();

require __DIR__ . "/../init.php";

$pathInfo = $_SERVER['PATH_INFO'];

$routes = [
    '/' => [
        'controller' => 'noteController',
        'method' => 'index'],
    '/index' => [
        'controller' => 'noteController',
        'method' => 'index' ],
    '/add' => [
        'controller' => 'noteController',
        'method' => 'addNote' ],
    '/edit' => [
        'controller' => 'noteController',
        'method' => 'editNote' ],
    '/editnote' => [
        'controller' => 'noteRepository',
        'method' => 'updateNote',
        'redirect' => 'index' ],
    '/addnote' => [
        'controller' => 'noteRepository',
        'method' => 'saveNote',
        'redirect' => 'index' ],
    '/deletenote' => [
        'controller' => 'noteRepository',
        'method' => 'deleteNote',
        'redirect' => 'index' ],
    '/login' => [
        'controller' => 'loginController',
        'method' => 'login'
        ],
    '/logout' => [
        'controller' => 'loginController',
        'method' => 'logout'
        ],     
    ];

if (isset($routes[$pathInfo])) {
    try {
        $route = $routes[$pathInfo];
        $controller = $container->make($route['controller']);
        $method = $route['method'];
        $controller->$method();
        if (isset($route['redirect'])) {
            $target = $route['redirect'];
            header("Location:$target");
        }
    } catch( NoAuthException $ex) {
        header("Location: login");
    }
    
} else {
    echo "Unknown route";
}

?>