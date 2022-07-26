<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once(__DIR__."/../inc/autoload.php");






$container = new \App\Controller\Container();

$container->add('Database', function() use($container) {
    require __DIR__ . ("/../inc/db.php");
    return $db;
});

$container->add('PageRepository', function() use($container) {
    return new \App\Model\PageRepository($container->get('Database'));
});

$container->add('PageController', function() use($container) {
    return new \App\Controller\PageController(
        $container->get('PageRepository')
    );
});

// Planning if Themesystem is necessary

$container->add('ThemeRepository', function() use($container) {
    return new \App\Model\ThemeRepository(
        $container->get('Database')
    );
});


$container->add('ThemeController', function() use($container) {
    return new \App\Controller\ThemeController(
        $container->get('ThemeRepository')
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