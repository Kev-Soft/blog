<?php

namespace App\Controller;



class PageController {

    

    
    public function __construct(public PageRepository $pageRepository) {
         
    } 

    public function render() {
        //ob_start()
    }

    public function checkPage($route):bool {
        if($route === "index") {
            return true;
        } 
            return false;
        }

    public function getPage(string $route) {
        if($this->checkPage($route)) {
            var_dump($this->pageRepository->category);
        }
    }


}