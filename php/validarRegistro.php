<?php 
session_start();

require_once("../clases/AccesoDatos.php");
require_once("../clases/cliente.php");
$usuario=$_POST['usuario'];
$retorno;

if(!cliente::validarRegistro($_POST['usuario']))
{
	$_SESSION['registrado']=$usuario;

	$retorno="ingreso";
	
}else
{
	$retorno="esta";

}
echo $retorno;
?>