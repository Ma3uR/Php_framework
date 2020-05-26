<?php
declare(strict_types=1);

if (file_exists('vendor/autoload.php')) {
    require ('vendor/autoload.php');
}
    require('config/config.php');
if (isset($_SERVER['REQUEST_URI']) && ($controllerName = trim($_SERVER['REQUEST_URI'], '/'))) {
            $controllerClass = "\App\Controller\\" . ucfirst($controllerName);
        } else {
            $controllerClass = App\Controller\Movies::class;
        }
        $controller = new $controllerClass;
        $controller->execute();
//    $dispatcher = new app\Controller\Dispatcher;
//    $dispatcher->dispatch();

