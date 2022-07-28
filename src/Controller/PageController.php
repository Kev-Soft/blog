<?php

namespace App\Controller;



class PageController {

    
    
    
    public function __construct(public \APP\Model\PageRepository $pageRepository) {
        
    } 


    //Render Function
    //Receive Route & Data from PageRepo

    public function render($route, \APP\Model\PageRepository $pageRepository) {

        ob_start();
            require __DIR__ .("/../View/".$route.".view.php"); 
            $content = ob_get_contents();
        ob_flush();

        return $content;
        
    }


    //checkPage Function
    //more implementation are following
    //database readout for valid page

    public function checkPage($route):bool {

        if($route === "index") {
            return true;
        } 
            return false;
        }

    
    //getPage function 
    //first -> checkPage to validate right route
    //second ->render template
    
    public function getPage(string $route, $pageRepository) {

        if($this->checkPage($route)) {
            $this->render($route, $pageRepository);
            
        }
    }


}