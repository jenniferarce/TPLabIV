<?php 
session_start();
if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/invitado.php");
	require_once("clases/cliente.php");

	$arrayTipo=cliente::traerTipo($_SESSION['registrado']);
    $tipo=$arrayTipo->tipo_usuario;

	$prov;$dir;$loc;
	$arrayDeInvitados=invitado::TraerInvitados($_SESSION['registrado']);
	$arrayDeClientes=cliente::TraerClientes();
	/*$prov=cliente::traerprov($_SESSION['registrado']);
	$dir=cliente::traerdir($_SESSION['registrado']);
	$loc=cliente::traerloc($_SESSION['registrado']);*/
	
	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";
	
	if($tipo=="cliente"){
	?>

		<br>

		<table class="table"  style=" background-color:transparent;" method="post">
			<thead>
			<tr>
				<th>Editar</th><th>Borrar</th><th>DNI</th><th>Nombre</th><th>Parentezco</th><th></th>
			</tr>
		</thead>
		<tbody>

		<?php 
	
			foreach ($arrayDeInvitados as $invitado) {

			echo"<tr>
				<td><a onclick='EditarInvitado($invitado->dni)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
				<td><a onclick='BorrarInvitado($invitado->dni)' class='btn btn-danger'><span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
				<td>$invitado->dni</td>
				<td>$invitado->nomyape</td>
				<td>$invitado->pariente</td>
				<td>$invitado->nromesa</td>	
			</tr>   ";
		}  
		 ?>
		
		 <br> <a href="archivos/descargaExcel.php">Descargar Excel</a>
		 
		<!-- <br><button onclick="VerEnMapa('$prov','$dir','$loc')" class="btn btn-info">Ver en Mapa  -->
		</tbody>
		</table>
		<?php 	
	}//IF==CLIENTE
			//********************************** ADMIN:
	elseif ($tipo=="admin") 
	{ ?>
			<br>
			<table class="table"  style=" background-color:transparent;" method="post">
			<thead>
				<tr>
				<th>Foto</th><th>Usuario</th><th>Nombre</th><th>E-mail</th><th>Telefono</th>
				</tr>
			</thead>
			<tbody>

			<?php 

			foreach ($arrayDeClientes as $ccliente) {
				echo"<tr>
				<td> <img  src='".$ccliente->foto."' width='30' height='30' /></td>
				<td>$ccliente->usuario</td>
				<td>$ccliente->nombre</td>
				<td>$ccliente->email</td>
				<td>$ccliente->telefono</td>
				</tr>   ";
			
			}  
		 ?>
		 	<!--<br> <a href="archivos/descargaExcel.php">Descargar Excel</a> --> 
		 
			<!-- <br><button onclick="VerEnMapa('$prov','$dir','$loc')" class="btn btn-info">Ver en Mapa  -->
			</tbody>
			</table>

	<?php }//IF==ADMIN

}//REGISTRADO
else	{
		echo "<h4 class='widgettitle'>Para acceder, ingrese a su cuenta.</h4>";
}//NO REGISTRADO

?>