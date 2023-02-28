<?php
require_once("Conexion.php");
require_once("Usuario.php");
require_once("password.php");
require_once("Informacion.php");

class Consultas {
    
    private $conn;
    private $tabla;
    
    public function __construct($tabla) {
        $this->conn = new Conexion();           
        $this->tabla = $tabla;
    }
    
    public function select($usuario,$contrasena){
        $listado=array();
        //$sqlSelectUsuario = $this->conn->conexion->query("SELECT U.email ,P.contrasena FROM usuario U INNER JOIN contrasena P ON U.id=P.id WHERE U.email='".$usuario."' AND p.contrasena='".$contrasena."'");
        $sqlSelectUsuario = $this->conn->conexion->query("SELECT U.usuario ,P.password FROM usuario U INNER JOIN password P ON U.id=P.id WHERE U.usuario='".$usuario."' AND p.password='".$contrasena."'");
        while($lista=$sqlSelectUsuario->fetch_assoc()){
            $datos=(object)$lista;
            array_push($listado,$datos);
        }
        return $listado;
    }
    
    public function img($usuario,$contrasena){
        $listado=array();
        //$sqlSelectUsuario = $this->conn->conexion->query("SELECT U.email ,P.contrasena FROM usuario U INNER JOIN contrasena P ON U.id=P.id WHERE U.email='".$usuario."' AND p.contrasena='".$contrasena."'");
        $sqlSelectImg = $this->conn->conexion->query("SELECT u.Imagen FROM usuario U INNER JOIN password P ON U.id=P.id WHERE U.usuario='".$usuario."' AND p.password='".$contrasena."'");
        while($lista=$sqlSelectImg->fetch_assoc()){
            $datos=(object)$lista;
            array_push($listado,$datos);
        }
        return $listado;
    }
    
    public function insertar($user,$nombreApellidos,$email,$contrasena,$sexo,$fecha,$direccion,$pais,$notificaciones,$revista,$img,$tarjeta){
        
        $usuario = new Usuario($user,$img);
        
        //INSERT PARA INSERTAR EL NUEVO USUARIO
        
        $sqlInsertarUsuario="INSERT INTO usuario(usuario,Imagen) VALUES ('".$usuario->getUsuario()."','".$usuario->getImg()."')";
        $ejecutar = $this->conn->conexion->query($sqlInsertarUsuario);
        
        //SELECT PARA SACAR ID DEL USUARIO INSERTADO
        
        $sqlSelectUsuario = $this->conn->conexion->query('SELECT usuario.id FROM usuario WHERE usuario LIKE "'.$user.'"');
        $row = $sqlSelectUsuario->fetch_array();
        $id = $row[0];
        
        $password = new password($id,$contrasena);
        
        //INSERTAMOS LA CONTRASEÑA DEL USUARIO MEDIANTE RECOGIENDO EL ID DEL USUARIO QUE ACABAMOS DE CREAR
        
        $sqlInsertarPassword="INSERT INTO password VALUES ('".$id."','".$contrasena."')";
        $ejecutar2 = $this->conn->conexion->query($sqlInsertarPassword);
        
        $informacion = new Informacion($id, $nombreApellidos, $fecha, $sexo, $direccion, $tarjeta, $pais, $notificaciones, $revista);
        
        //INSERTAMOS LA INFORMACION DEL USUARIO MEDIANTE SU ID
        
        //$sqlInsertarInfo="INSERT INTO informacion VALUES ('".$id."','".$sexo."','".$fecha."','".$direccion."','".$pais."','".$notificaciones."','".$revista."')";
        $sqlInsertarInfo="INSERT INTO informacion VALUES ('".$id."','".$nombreApellidos."','".$email."','".$fecha."','".$sexo."','".$direccion."','".$pais."','".$notificaciones."','".$revista."','".$tarjeta."')";
        $ejecutar3 = $this->conn->conexion->query($sqlInsertarInfo);
    }
    
}
