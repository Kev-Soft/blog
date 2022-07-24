<?php

namespace App\Controller;

class PageRepository {

    public string $category = "Kategorie 1";
    public string $title = "Titel";
    public string $content = "Hallo, erster Eintrag!";

    public function __construct () {
        return $this;
    }

    public function loadContent() {
        
    }
}