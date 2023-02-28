<?php

require_once ("Consultas.php");
require_once ("Usuario.php");

class password {
    
    private $id;
    private $contrasena;
    
    public function __construct($id,$contrasena) {
        
        $this->id = $id;
        $this->contrasena = $contrasena;
    }

    
    
}
