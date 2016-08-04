<?php 
session_start();

if(isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/cliente.php");
	require_once("clases/invitado.php");
	

	$arrayTipoCliente=cliente::traerTipo($_SESSION['registrado']);
    $tipo=$arrayTipoCliente->tipo_usuario;

	$estadisticas=invitado::TraerEstadisticas($_SESSION['registrado']);
	$estCliente=invitado::EstadisticasClientes();


	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

   		if($tipo=="cliente") {
   ?>

		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
		</div>

		<table class="table" id="tablaEstadistica" style=" background-color: beige;display:none;">
			<thead>
				<tr>
					<th>Mesas</th><th>Invitados en mesas</th>
				</tr>
			</thead>
		<tbody>
		<?php 

			foreach ($estadisticas as $row) {
			echo"<tr>
				<td></td>
				<td>".$row["invitadosenmesa"]."</td>
				</tr>   ";
			}
		 ?>
		</tbody>
		</table>
 <?php  }//IF==CLIENTE  //**************----------------------

 		elseif ($tipo=="admin") { ?><!-- ESTADISTICAS CANTIDAD DE INVITADOS POR CLIENTE  -->


 				<div id="containerCI" style="min-width: 310px; height: 400px; margin: 0 auto">
				</div>

				<table class="table" id="estadisticaCI" style=" background-color: beige;display:none;"> 
					<thead>
					<tr>
						<th>Invitados</th><th>Clientes</th>
					</tr>
					</thead>
				<tbody>
					<?php 

					foreach ($estCliente as $row) {
						echo"<tr>
							<td></td>
							<td>".$row["invitadosxcliente"]."</td>
							<td>".$row["idC"]."</td>
							</tr>   ";
						}
		 			?>
				</tbody>
				</table>


 		<?php }//IF==ADMIN
	}//REGISTRADO

else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}//NO REGISTRADO

	 ?>


<script type="text/javascript">

	$(function () {
    	$('#container').highcharts({
        	data: {
            	table: 'tablaEstadistica'
        		},
        	chart: {
            	type: 'column'
        		},
        	title: {
            	text: 'Estadistica'
        		},
        	yAxis: {
            	allowDecimals: false,
            title: {
                text: 'Cantidad'
            	}
        	},
        	tooltip: {
            	formatter: function () {
                	return '<b>' + this.series.name + '</b><br/>' +
                    	this.point.y + ' ' + this.point.name.toLowerCase();
            		}
        		}
    	});
	});

</script> <!-- PARA INVITADOS -->

<script type="text/javascript">

	$(function () {
    	$('#containerCI').highcharts({
        	data: {
            	table: 'estadisticaCI'
        		},
        	chart: {
            	type: 'column'
        		},
        	title: {
            	text: 'Estadistica'
        		},
        	yAxis: {
            	allowDecimals: false,
            title: {
                text: 'Cantidad'
            	}
        	},
        	tooltip: {
            	formatter: function () {
                	return '<b>' + this.series.name + '</b><br/>' +
                    	this.point.y + ' ' + this.point.name.toLowerCase();
            		}
        		}
    	});
	});

</script> <!-- PARA CLIENTES -->