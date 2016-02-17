function validarLogin()
{
		var varUsuario=$("#usuario").val();
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

			$("#informe").html("Usuario o clave incorrecta");	
			$("#formLogin").addClass("animated bounceInLeft");
			$("#usuario").html(retorno);
		}
		else{
			Mostrar('mostrarlogin');
			MostrarBotones();
			$("#BotonLogin").html("Ir a salir<br>-Sesión-");
			$("#BotonLogin").addClass("btn btn-danger");				
			$("#usuario").val("usuario: "+retorno);
		}
	});
	funcionAjax.fail(function(retorno){

	});
}//fin validarLogin

function validarRegistro() //REVISAR
{
	var varUsuario=$("#usuario").val();

	var funcionAjax=$.ajax({
		url:"php/validarRegistro.php",
		type:"post",
		data:{
			usuario:varUsuario}
		});
	funcionAjax.done(function(retorno){
		if(retorno=="esta"){
			alert("El usuario no se encuentra disponible");
			Mostrar('mostrarregistro');
			$("#usuario").html(retorno);
		}
		else{
			GuardarCliente();
		}
	});
	funcionAjax.fail(function(retorno){

	});

}//fin validarRegistro

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogear.php",
		type:"post",	
	});
	funcionAjax.done(function(retorno){
			MostrarBotones();
			Mostrar('mostrarlogin');
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");		
	});	
}//fin deslogear
