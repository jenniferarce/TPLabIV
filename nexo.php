<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/cliente.php");
require_once("clases/invitado.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'mostrarlogin':
			include("partes/formIngreso.php");
		break;
	case 'mostrarregistro':
			include("partes/formRegistro.php");
		break;
	case 'ingresarInvitados':
			//include("partes/formVotar.php");
		break;
	case 'mostrarInvitados':
			//include("partes/formListado.php");
		break;
	case 'BorrarInvitado':
			$cliente = new cliente();
			$cliente->id=$_POST['id'];
			$cantidad=$cliente->BorrarCliente();
			echo $cantidad;
	break;
	case 'GuardarCliente':
			$cliente = new cliente();
			$cliente->id=$_POST['id'];
			$cliente->usuario=$_POST['usuario'];
			$cliente->clave=$_POST['clave'];
			$cliente->nombre=$_POST['nombre'];
			$cliente->telefono=$_POST['telefono'];
			$cliente->email=$_POST['email'];
			
			$cantidad=$cliente->GuardarCliente();
			echo $cantidad;
	break;
	case 'TraerInvitados':
			//$invitado = invitado::TraerUninvitado($_POST['id']);	
			$invitado=invitado::TraerInvitados();	
			echo json_encode($invitado) ;

	break;
	case 'TraerInvitadosId':
		$invitado = invitado::TraerinvitadosId($_POST['id']);	 
		echo json_encode($invitado);
	break;
	/*case 'VerEnMapa':
		include("partes/formMapa.php");
	break;*/
	default:
		# code...
		break;
}

 ?>