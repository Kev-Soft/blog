<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

use App\Controller\PageController;
use App\Controller\PageRepository;

require("../inc/autoload.php");

//Repository muss anhand der Route noch gefilter werden
$pageRepository = new PageRepository;


if (isset($_GET['route'])) {
    $controller = new PageController($pageRepository);
    $controller->getPage($_GET['route']);
}
else {
    

    $controller = new PageController($pageRepository);
    $controller->getPage('index');   
}


?>