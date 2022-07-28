<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once(__DIR__."/../inc/autoload.php");






$container = new \App\Controller\Container();

$container->add('Database', function() use($container) {
    return require __DIR__ . ("/../inc/db.php");
});

$container->add('PageRepository', function() use($container) {
    return new \App\Model\PageRepository($container->get('Database'));
});

$container->add('PageController', function() use($container) {
    return new \App\Controller\PageController(
        $container->get('PageRepository')
    );
});






if (isset($_GET['route'])) {
    $controller = $container->get('PageController');
    $route = $_GET['route'];
    $controller->getPage($route);
}
else {
    

    $controller = $container->get('PageController');
    $controller->getPage('index', $container->get('PageRepository'));   
}


?>