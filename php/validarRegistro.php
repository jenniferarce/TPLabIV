<?php 
session_start();
$usuario=$_POST['usuario'];

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