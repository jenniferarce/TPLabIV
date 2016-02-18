<?php 
//REVISAR
session_start();
if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/invitado.php");
	require_once("clases/cliente.php");

	$arrayDeInvitados=invitado::TraerInvitados($_SESSION['registrado']);//cliente::retornoID($_SESSION['registrado']));
	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";
	
	?>

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
	<!--	<br><td><button onclick="archivos/descargaExcel.php" class="btn btn-sucess"><span class='glyphicon glyphicon-download'>&nbsp;</span>Descarga Excel<td> 
		 <br><td><button onclick="" class="btn btn-info"></td> 
		 <br><td><button onclick="" class="btn btn-info"></td> -->
		<a href="archivos/descargaExcel.php" >Descargar Excel</a>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>Para acceder, ingrese a su cuenta.</h4>";
	}

	 ?>