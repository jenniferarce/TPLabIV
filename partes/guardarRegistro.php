<?php

session_start();

require_once("../clases/AccesoDatos.php");
require_once("../clases/cliente.php");
require_once("../clases/invitado.php");


		$cliente = new cliente();
		$cliente->usuario=$_POST['usuario'];
		$cliente->clave=md5($_POST['clave']);
		$cliente->nombre=$_POST['nombre'];
		$cliente->telefono=$_POST['telefono'];
		$cliente->email=$_POST['email'];
		$cliente->provincia=$_POST['provincia'];
		$cliente->direccion=$_POST['direccion'];
		$cliente->localidad=$_POST['localidad'];

	if(!$_FILES['foto']['tmp_name'] == ""){
		$ruta=getcwd(); //obtiene la ruta donde está parado este archivo PHP
		$destino=$ruta."fotos/".$_POST['usuario'].".jpg";
		move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
		$foto="fotos/".$_POST['usuario'].".jpg";
		$cliente->foto=$foto;	
	}


	$cliente->GuardarCliente();


	//echo "<script>Mostrar('mostrarInvitados')</script>";
	header("location: ../index.php");

?>