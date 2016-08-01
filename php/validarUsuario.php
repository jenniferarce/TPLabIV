<?php 
require_once("../clases/AccesoDatos.php");
require_once("../clases/cliente.php");
session_start();
$usuario=$_POST['usuario'];
$clave = md5($_POST['clave']);
$recordar=$_POST['recordarme'];


$retorno;
if(cliente::validarCliente($usuario,$clave))
{
	if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}
	$_SESSION['registrado']=$usuario;
	$retorno="ingreso";
}else
{
		$retorno= "No-esta"; 
}
echo $retorno;
?>