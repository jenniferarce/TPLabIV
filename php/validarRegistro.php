<?php 
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;
if(!cliente::validarRegistro($_POST['usuario'])
{
	$_SESSION['registrado']=$usuario;

	$retorno="ingreso";
	
}else
{
	$retorno="esta";

}
echo $retorno;
?>