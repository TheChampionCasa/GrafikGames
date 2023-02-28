<?php
require '../MODELO/consultas.php';

//Datos del formulario de registro
$user=$_POST['usuario'];
$contrasena=$_POST['password'];
//Metemos los datos
$obj = new Consultas("usuario");
$Login=array();
$Login = $obj->select($user, $contrasena);
$ArrayImg = $obj->img($user, $contrasena);
$img = $ArrayImg[0]->Imagen;
if(count($Login)>0){
    header("Location: ../home.php");
    setcookie("Usuario",$user,time()+3600,"/");
    //setcookie("Password",$contrasena,time()+10);
    setcookie("ImagenUsuario",$img,time()+3600,"/");
}else{
    header("Location: ../Login.php?error=1");
}


