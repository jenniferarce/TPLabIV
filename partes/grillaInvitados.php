<?php 
//REVISAR
session_start();
if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/invitado.php");
	require_once("clases/cliente.php");

	$arrayDeInvitados=invitado::TraerInvitados(cliente::retornoID($_SESSION['registrado']));
	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";
 ?>
<table class="table"  style=" background-color:transparent;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>DNI</th><th>Nombre</th><th>Parentezco</th><th>Mesa</th>
		</tr>
	</thead>
	<tbody>

		<?php 
		
foreach ($arrayDeInvitados as $invitado) {
	echo"<tr>
			<td><a onclick='EditarInvitado($invitado->dni)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='BorrarInvitado($invitado->dni)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
			<td>$invitado->dni</td>
			<td>$invitado->nomyape</td>
			<td>$invitado->pariente</td>
			<td>$invitado->nromesa</td>	
		</tr>   ";
		//<td><a onclick='VerEnMapa('$invitado->provincia','$invitado->direccion','$invitado->localidad','$invitado->id')' class='btn btn-info'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Ver mapa</a></td>
} 
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>Para acceder, ingrese a su cuenta.</h4>";
	}

	 ?>