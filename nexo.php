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
	case 'EditarCliente':
		include("partes/formModCliente.php");
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
			$cliente->foto=$_POST['foto']; 

			if(!isset($_FILES["foto"]))
  				{
    				// no se cargo una imagen
  				}
  			else
  				{
    				if($_FILES["foto"]['error'])
   	 				{
      					//error de imagen
    				}
    				else
    				{
      				$tamanio =$_FILES['foto']['size'];
        				if($tamanio>1024000)
        				{
            			// "Error: archivo muy grande!"."<br>";
        				}
        				else
        				{
          				//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
        				//IMAGEN, RETORNA FALSE
        				$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);
        					if($esImagen === FALSE) 
        					{
              					//NO ES UNA IMAGEN
        					}
        					else
        					{
         					$NombreCompleto=explode(".", $_FILES['foto']['name']);
         					$Extension=  end($NombreCompleto);
        					$arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp","png");  //defino antes las extensiones que seran validas
          						if(!in_array($Extension, $arrayDeExtValida))
          						{
            				 	//"Error archivo de extension invalida";
          						}
          						else
          						{
            					//$destino =  "fotos/".$_FILES["foto"]["name"];
            					$destino = "fotos/". $_FILES['foto']['name'];//.".".$Extension;
            					$foto=$_POST['usuario'].".".$Extension;
            					//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
              						if (move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
              						{   
                   						echo "ok";
                					}
                					else
                					{   
                  					// algun error;
                					}
          						}
        					}
      					}     
    				}
  				} 

  			$cliente->tipo_usuario=$_POST['tipo_usuario']; // ver

			
			$cantidad=$cliente->GuardarCliente();
			echo $cantidad;
	break;
	case 'GuardarInvitado':
	session_start();
			$invitado = new invitado();
			$invitado->user=$_SESSION['registrado'];
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
			$invitado->user=$_SESSION['registrado'];
			$invitado->dni=$_POST['dni'];
			$invitado->nomyape=$_POST['nomyape'];
			$invitado->pariente=$_POST['pariente'];
			$invitado->nromesa=$_POST['nromesa'];
			
			$cantidad=$invitado->ModificarInvitado();
			echo $cantidad;
	break;
	case 'MostrarEstadisticas':
		include("archivos/estadisticas.php");
	break;
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