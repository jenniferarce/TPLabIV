<?php 
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
//recordar=$_POST['recordarme'];

$retorno;
//if(cliente::validarCliente($_POST['usuario'],$_POST['clave']))
if($_POST['usuario']=="jenn" && $_POST['clave']=="1234"))
{
	/*if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}*/
	$_SESSION['registrado']=$usuario;

	$retorno="ingreso";
}else
{
		$retorno= "No-esta"; 
}
echo $retorno;
?>