<?php
require '../MODELO/consultas.php';

//Datos del formulario de registro
$user=$_POST['usuario'];/*Es como el getelementbyid*/
$nombreApellidos=$_POST['nombreApellidos'];
$email=$_POST['email'];
$contrasena=$_POST['password'];
$sexo=$_POST['sexo'];
$fecha=$_POST['fecha'];
$direccion=$_POST['direccion'];
$pais=$_POST['pais'];
$notificaciones=$_POST['notificaciones'];
$revista = $_POST['revista'];
$img = "imgs/Login.png";
$tarjeta = $_POST["tarjeta"];
//Metemos los datos
$obj = new Consultas("usuario");
//$insertar = $obj->insertar($user, $nombreApellidos, $email, $contrasena, $sexo, $fecha, $direccion, $pais, $notificaciones, $revista);
$insertar = $obj->insertar($user, $nombreApellidos, $email, $contrasena, $sexo, $fecha, $direccion, $pais, $notificaciones, $revista,$img,$tarjeta);
header ("Location:../Login.php?Registro=true");