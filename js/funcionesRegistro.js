function validarRegistro() //VER
{
		var varUsuario=$("#usuario").val();

	var funcionAjax=$.ajax({
		url:"php/validarRegistro.php",
		type:"post",
		data:{
			usuario:varUsuario}
		});
	funcionAjax.done(function(retorno){
		if(retorno=="No-esta"){
			//mostrarregistro();
			GuardarCliente();
			$("#usuario").html(retorno);
		}
		else{}
	});
	funcionAjax.fail(function(retorno){

	});

}//fin validarRegistro

function validarInvitado()
{

}//fin validarInvitado