<?php
session_start();
if(isset($_SESSION['registrado']))
{
	require_once("../clases/AccesoDatos.php");
	require_once("../clases/invitado.php");
	require_once("excel.php"); 
	require_once("excel-ext.php"); 

	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=invitados.xls"); 

	$arrayDeInvitados=invitado::TraerInvitados($_SESSION['registrado']);


	foreach ($arrayDeInvitados as $invitado) 
		{
			$assoc = array(
				array("DNI"=>$invitado->dni, "Nombre"=>$invitado->nomyape, "Parentezco"=>$invitado->pariente, "Mesa"=>$invitado->nromesa)
						  );
		}

createExcel("invitados.xls", $assoc);
exit;

}
?>