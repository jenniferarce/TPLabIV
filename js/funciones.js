function ingresoInvitados()
{

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"ingresoInvitados"}
	});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);	
	});
}//fin ingresoInvitados
function Mostrar(quemostrar)
{
	var funcionAjax = $.ajax({
	url: 'nexo.php',
	type: 'post',
	data:{queHacer: quemostrar}
	});
	funcionAjax.done(function(retorno)
	{
		$('#principal').html(retorno);
	});
		funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}


function MostrarBotones()
{	
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarBotones"}
	});
	funcionAjax.done(function(retorno){
		//$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}//fin MostarBotones

