<?php

class Informacion {
    public $id;
    public $nombreApellidos;
    public $fecha;
    public $sexo;
    public $domicilio;
    public $tarjeta;
    public $pais;
    public $notificaciones;
    public $revista;
    
    public function __construct($id, $nombreApellidos, $fecha, $sexo, $domicilio, $tarjeta, $pais, $notificaciones, $revista) {
        $this->id = $id;
        $this->nombreApellidos = $nombreApellidos;
        $this->fecha = $fecha;
        $this->sexo = $sexo;
        $this->domicilio = $domicilio;
        $this->tarjeta = $tarjeta;
        $this->pais = $pais;
        $this->notificaciones = $notificaciones;
        $this->revista = $revista;
    }

    
    
}
