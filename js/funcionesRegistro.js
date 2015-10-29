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
			mostrarregistro();
			$("#usuario").html(retorno);
		}
		else{
			GuardarCliente();
		}
	});
	funcionAjax.fail(function(retorno){

	});

}//fin validarRegistro

function validarInvitado()
{
	//HACER
}//fin validarInvitado