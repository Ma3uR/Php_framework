<?php
//declare(strict_types=1);
//namespace App\Controller;
//class Dispatcher
//{
//    public function dispatch(): void
//    {
//        if (isset($_SERVER['REQUEST_URI']) && ($controllerName = trim($_SERVER['REQUEST_URI'], '/'))) {
//            $controllerClass = "\App\Controller\\" . ucfirst($controllerName);
//        } else {
//            $controllerClass = Movies::class;
//        }
//        $controller = new $controllerClass;
//        $controller->execute();
//    }
//
//}