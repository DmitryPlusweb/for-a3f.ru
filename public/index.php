<?php

require dirname(__DIR__) . '/vendor/autoload.php';
use plusweb\Application;
use plusweb\Controller;

$app = new Application();
$controller = new Controller();
$app->router->get('/ajax', function(){
    $controller = new Controller();
    
    return $controller->partialAction();
});
$app->router->get('/', function(){
    $controller = new Controller();
    
    return $controller->mainAction();
});
$app->run();

