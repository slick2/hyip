<?php

class Model {
    public $mysqli;
    public function __construct(){
        $this->mysqli = Database::getInstance();
    }
    
    public function get_data() {
        
    }

}
