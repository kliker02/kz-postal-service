<?php
require 'vendor/autoload.php';

chdir(__DIR__);


$Config = [
    'controllers' => (require getcwd().'/config/controllers.php')['controllers'],
    'routes' => (require getcwd().'/config/routes.php')['routes'],
];

$Application = new \Aleksandr\KzPostal\Core\Application($Config);
$Application->run();