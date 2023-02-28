<?php
class Conexion {
   private $hostname="localhost";
   private $usuario="pedro";
   private $password="1234";
   private $basededatos="prueba";
   public $conexion;
   
   
   public function __construct() {
       $this->conexion= new mysqli($this->hostname,$this->usuario,$this->password,$this->basededatos);
       if($this->conexion->connect_errno){
           die("Error a la hora de conectar la base de datos");
       }
   }
   
   

}
