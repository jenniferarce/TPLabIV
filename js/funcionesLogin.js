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
		if(retorno=="No-esta"){
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
