<?php
 
 namespace App\Controller;

class Container {

    protected $builds = [];
    protected $instances = [];

    public function add(string $object, \Closure $func) {

        $this->builds[$object] = $func;
        
    }

    
    public function get($object) {

        if (!isset($this->instances[$object])) {

            $this->instances[$object] = $this->builds[$object]();
        }

        return $this->instances[$object];
        
    }


}
?>