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

function validarLogin()
{
		var varUsuario=$("#dni").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');

	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave}
		});
	funcionAjax.done(function(retorno){
		if(retorno="No-esta"){
			mostrarlogin();
			$("#usuario").html(retorno);
		}
		else{}
	});
	funcionAjax.fail(function(retorno){

	});
}//fin validarLogin

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogear.php",
		type:"post",	
	});
	funcionAjax.done(function(retorno){
			MostarBotones();
			mostrarlogin();
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");		
	});	
}//fin deslogear

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
}//fin MostarBotones

