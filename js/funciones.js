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

