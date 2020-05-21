<?php
if (file_exists('vendor/autoload.php')) {
    require ('vendor/autoload.php');
}
//require('config/config.php');
//if (isset($_SERVER['PATH_INFO']) && ($controllerName = trim($_SERVER['PATH_INFO'], '/'))) {
//    $controllerClass = "\App\Controller\\" . ucfirst($controllerName);
//} else {
//    $controllerClass = \App\Controller\Movies::class;
//}
//$controller = new $controllerClass;
//$controller->execute();
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];

echo $url;