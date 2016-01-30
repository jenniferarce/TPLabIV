<?php 
require_once("../clases/AccesoDatos.php");
require_once("../clases/cliente.php");
session_start();
$usuario=$_POST['usuario'];
$clave = md5($_POST['clave']);
//recordar=$_POST['recordarme'];

$retorno;
$idonline;
if(cliente::validarCliente($_POST['usuario'],md5($_POST['clave'])) )
{
	/*if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}*/
	//setcookie("idonline",cliente::retornoID($_SESSION['registrado']);
	$_SESSION['registrado']=$usuario;
	$retorno="ingreso";
}else
{
		$retorno= "No-esta"; 
}
echo $retorno;
?>