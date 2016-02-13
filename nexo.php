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
			$invitado->dni=$_POST['dni'];
			$cantidad=$invitado->BorrarInvitado();
			echo $cantidad;
	break;
	case 'EditarInvitado':
		include("partes/formModificar.php");
	break;
	case 'GuardarCliente':
			$cliente = new cliente();
			$cliente->id=$_POST['id'];
			$cliente->usuario=$_POST['usuario'];
			$cliente->clave=md5($_POST['clave']);
			$cliente->nombre=$_POST['nombre'];
			$cliente->telefono=$_POST['telefono'];
			$cliente->email=$_POST['email'];
			$cliente->provincia=$_POST['provincia'];
			$cliente->direccion=$_POST['direccion'];
			$cliente->localidad=$_POST['localidad'];
			
			$cantidad=$cliente->GuardarCliente();
			echo $cantidad;
	break;
	case 'GuardarInvitado':
	session_start();
			$invitado = new invitado();
			//$invitado->id=$_POST['idd'];
			$invitado->user=$_SESSION['registrado'];//$_POST['user'];
			//$invitado->id=cliente::retornoID($_SESSION['registrado']);//$_POST['id'];//de cliente
			$invitado->dni=$_POST['dni'];
			$invitado->nomyape=$_POST['nomyape'];
			$invitado->pariente=$_POST['pariente'];
			$invitado->nromesa=$_POST['nromesa'];
			
			$cantidad=$invitado->GuardarInvitado();
			echo $cantidad;
	break;
	case 'ModificarInvitado':
	session_start();
			$invitado = new invitado();
			//$invitado->id=$_POST['idd'];
			$invitado->user=$_SESSION['registrado'];//$_POST['user'];
			//$invitado->id=cliente::retornoID($_SESSION['registrado']);//$_POST['id'];//de cliente
			$invitado->dni=$_POST['dni'];
			$invitado->nomyape=$_POST['nomyape'];
			$invitado->pariente=$_POST['pariente'];
			$invitado->nromesa=$_POST['nromesa'];
			
			$cantidad=$invitado->ModificarInvitado();
			echo $cantidad;
	break;
	/*case 'TraerInvitados':
			//$invitado = invitado::TraerUninvitado($_POST['id']);	
			$invitado=invitado::TraerInvitados(cliente::retornoID($_POST['usuario']));	
			echo json_encode($invitado);

	break;*/
	case 'TraerInvitadosDNI':
		$invitado = invitado::TraerInvitadosDNI($_POST['dni']);	 
		echo json_encode($invitado);
	break;
	case 'VerEnMapa':
		include('partes/formMapaGoogle.php');
		break;
	case 'MostrarBotones':
		include("partes/botonesABM.php");
		break;
	default:
		# code...
		break;
}

 ?>