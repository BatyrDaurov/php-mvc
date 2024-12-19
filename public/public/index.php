<?php

require_once __DIR__ . "/../vendor/autoload.php";


$app = new \app\core\Application(dirname(__DIR__));

$app->router->get("/", 'home');
$app->router->get("/contact", 'contact');

$app->run();