function mostrarlogin()
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:'nexo.php',
		type:'post',
		data:{queHacer:'mostrarlogin'}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
	});
}//fin mostrarlogin

function mostrarregistro()
{
	var funcionAjax=$.ajax({
		url:'nexo.php',
		type:'post',
		data:{queHacer:'mostrarregistro'}
	});
	funcionAjax.done(function(retorno){
		$('#principal').html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$('#informe').html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
	});
}//fin mostrarregistro


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
	//deslogear();
}//fin ingresoInvitados

function mostrarInvitados()
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"mostrarInvitados"}
	});

	funcionAjax.done(function(retorno){

		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);	
	});
}//fin mostrarInvitados

/*
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		//$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}//fin MostarBotones*/

