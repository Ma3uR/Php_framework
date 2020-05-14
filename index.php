<?php

if (file_exists('vendor/autoload.php')) {
    require ('vendor/autoload.php');
}

require("config/config.php");

$db = \App\Models\Db::getDbh()->prepare('SELECT * FROM movies');
$db->execute();

$result = $db->fetchAll();
echo '<pre>';
print_r($result);
echo '</pre>';