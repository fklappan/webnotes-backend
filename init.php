<?php
require __DIR__ . "/autoload.php";
require __DIR__ . "/version.php";
$config = parse_ini_file("config.ini.php");
$container = new App\Core\Container($config, $version);

