<?php

namespace App\Controller;


//PageRepo
//later Database readout for all Data
//
class PageRepository {

    public string $category = "Kategorie 1";
    public string $title = "Titel";
    public string $content = "Hallo, erster Eintrag!";

    public function __construct ($database) {
        return $this;
    }

    public function loadContent() {
        
    }
}