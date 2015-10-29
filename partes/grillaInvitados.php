<?php 
session_start();//HACER CAMBIOS!!!
if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/invitado.php");
	$arrayDeInvitados=invitado::TraerInvitados();
	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>Nombre</th><th>DNI</th><th>Localidad</th><th>Direccion</th><th>Pariente</th><th>Nro Mesa</th><th>Mapa</th>
		</tr>
	</thead>
	<tbody>

		<?php 
		
foreach ($arrayDeInvitados as $invitado) {
	echo"<tr>
			<td><a onclick='Editarinvitado($invitado->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='Borrarinvitado($invitado->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
			<td>$invitado->dni</td>
			<td>$invitado->provincia</td>
			<td>$invitado->localidad</td>
			<td>$invitado->direccion</td>
			<td>$invitado->candidato</td>
			<td>$invitado->sexo</td>
			<td><a onclick='VerEnMapa('$invitado->provincia','$invitado->direccion','$invitado->localidad','$invitado->id')' class='btn btn-info'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Ver mapa</a></td>
		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>