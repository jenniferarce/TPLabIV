
function blurFunction(){
	
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
	});
	funcionAjax.fail(function(retorno){

	});
}

