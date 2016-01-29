function validarLogin()
{
	alert("hola");
	/*alert("se esta validando");
		var varUsuario=$("#usuario").val();
		var varClave=$("#clave").val();
		//var recordar=$("#recordarme").is(':checked');

	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			//recordarme:recordar,
			usuario:varUsuario,
			clave:varClave}
		});
	funcionAjax.done(function(retorno){
		alert(retorno);
		if(retorno=="No-esta"){

			$("#informe").html("usuario o clave incorrecta");	
			$("#formLogin").addClass("animated bounceInLeft");
			$("#usuario").html(retorno);
		}
		else{
			alert("bienvenido");
			Mostrar('mostrarlogin');
			MostrarBotones();
			$("#BotonLogin").html("Ir a salir<br>-Sesión-");
			$("#BotonLogin").addClass("btn btn-danger");				
			$("#usuario").val("usuario: "+retorno);
		}
	});
	funcionAjax.fail(function(retorno){

	});*/
}//fin validarLogin

function validarRegistro()
{
		var varUsuario=$("#usuario").val();
		alert("registrando");
	var funcionAjax=$.ajax({
		url:"php/validarRegistro.php",
		type:"post",
		data:{
			usuario:varUsuario}
		});
	funcionAjax.done(function(retorno){
		alert(retorno);
		if(retorno=="esta"){
			alert("este usuario ya esta en uso");
			Mostrar('mostrarregistro');
			$("#usuario").html(retorno);
		}
		else{
			alert(retorno);
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
			MostarBotones();
			Mostrar('mostrarlogin');
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");		
	});	
}//fin deslogear
