<?php

require_once("Consultas.php");

class Usuario {
    public $id;
    private $usuario;
    private $img;
    
    public function __construct($usuario,$img) {
        $this->usuario = $usuario;
        $this->img = $img;
    }
    
    public function insertar(){
        $mod = new Consultas();
        $mod->insertar($this->usuario, $this->img);
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    public function getImg() {
        return $this->img;
    }



}
