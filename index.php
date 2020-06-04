<?php
declare(strict_types=1);
use \App\Controller\Dispatcher;
if (file_exists('vendor/autoload.php')) {
    require ('vendor/autoload.php');
}
    require('config/config.php');
    $dispatcher = new Dispatcher;
    $dispatcher->dispatch();

