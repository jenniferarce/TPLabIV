<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/cliente.php");
require_once("clases/invitado.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'mostrarlogin':
			include("partes/formIngreso.php");
		break;
	case 'ingresarInvitados':
			//include("partes/formVotar.php");
		break;
	case 'mostrarInvitados':
			//include("partes/formListado.php");
		break;
	case 'BorrarCliente':
			$cliente = new cliente();
			$cliente->id=$_POST['id'];
			$cantidad=$cliente->BorrarCliente();
			echo $cantidad;
	break;
	case 'GuardarCliente':
			$cliente = new cliente();
			$cliente->id=$_POST['id'];
			$cliente->dni=$_POST['dni'];
			$cliente->provincia=$_POST['provincia'];
			$cliente->localidad=$_POST['localidad'];
			$cliente->direccion=$_POST['direccion'];
			$cliente->candidato=$_POST['candidato'];
			$cliente->sexo=$_POST['sexo'];
			
			$cantidad=$cliente->GuardarCliente();
			echo $cantidad;
	break;
	case 'TraerClientes':
			//$cliente = cliente::TraerUncliente($_POST['id']);	
			$cliente=cliente::TraerClientes();	
			echo json_encode($cliente) ;

	break;
	case 'TraerclientesId':
		$cliente = cliente::TraerClientesId($_POST['id']);	 
		echo json_encode($cliente);
	break;
	/*case 'VerEnMapa':
		include("partes/formMapa.php");
	break;*/
	default:
		# code...
		break;
}

 ?>