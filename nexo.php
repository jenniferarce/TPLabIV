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
	case 'ingresoInvitados':
			include("partes/formInvitado.php");
		break;
	case 'mostrarInvitados':
			include("partes/grillaInvitados.php");
		break;
	case 'BorrarInvitado':
			$invitado = new invitado();
			$invitado->id=$_POST['id'];
			$cantidad=$invitado->BorrarInvitado();
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
	case 'GuardarInvitado':
			$invitado = new invitado();
			$invitado->id=$_POST['idd'];
			$cliente->id=$_POST['id'];
			$invitado->nom=$_POST['nom'];
			$invitado->dni=$_POST['dni'];
			$invitado->localidad=$_POST['localidad'];
			$invitado->direccion=$_POST['direccion'];
			$invitado->pariente=$_POST['pariente'];
			$invitado->nromesa=$_POST['nromesa'];
			
			$cantidad=$invitado->GuardarInvitado();
			echo $cantidad;
	break;
	case 'TraerInvitados':
			//$invitado = invitado::TraerUninvitado($_POST['id']);	
			$invitado=invitado::TraerInvitados();	
			echo json_encode($invitado) ;

	break;
	case 'TraerInvitadosId':
		$invitado = invitado::TraerInvitadosId($_POST['id']);	 
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