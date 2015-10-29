function GuardarCliente()
{
		var id=$("#id").val();
		var usuario=$("#usuario").val();
		var clave=$("#clave").val();
		var nombre=$("#nombre").val();
		var telefono=$("#telefono").val();
		var email=$("#email").val();
		//var sexo=$("input[name='sexo']:checked").val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarVoto",
			id:id,
			usuario:usuario,
			clave:clave,
			nombre:nombre,
			telefono:telefono,
			email:email,
			//sexo:sexo	
		}
	});
	funcionAjax.done(function(retorno){
		alert("Se registro correctamente!!");
		mostrarLogin();
		$("#informe").html("cantidad de agregados "+ retorno);
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}//fin GuardarCliente

function GuardarInvitado()
{
		//HACER CAMBIOS!!!
		
		var id=$("#id").val();
		var usuario=$("#usuario").val();
		var clave=$("#clave").val();
		var nombre=$("#nombre").val();
		var telefono=$("#telefono").val();
		var email=$("#email").val();
		//var sexo=$("input[name='sexo']:checked").val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarVoto",
			id:id,
			usuario:usuario,
			clave:clave,
			nombre:nombre,
			telefono:telefono,
			email:email,
			//sexo:sexo	
		}
	});
	funcionAjax.done(function(retorno){
		alert("Se registro correctamente!!");
		mostrarLogin();
		$("#informe").html("cantidad de agregados "+ retorno);
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}//fin GuardarVoto


function BorrarInvitado(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarInvitado",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		mostrarInvitados();
		$("#informe").html("cantidad de eliminados "+ retorno);		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}//fin BorrarInvitado

function EditarInvitado(idParametro)
{
	votacion();
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerInvitadosId",
			id:idParametro	
		     }
	});
		
	funcionAjax.done(function(retorno){
		var invitado =JSON.parse(retorno);
		//alert(retorno);
		$("#id").val(invitado.id);
		$("#nom").val(invitado.nom);
		$("#dni").val(invitado.dni);
		$("#direccion").val(invitado.direccion);
		$("#pariente").val(invitado.pariente);
		var nromesa = invitado.nromesa;


										if(nromesa=="Mesa-1")
										{
											$('input[id=nromesa][value="1"]').attr('checked', true); 
										}

										if(nromesa=="Mesa-2")
										{
											$('input[id=nromesa][value="2"]').attr('checked', true); 
										}*/


	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);
		alert("error");		
	});	
	
}//fin EditarInvitado



/*function VerEnMapa(prov, dire, loc, id)
{
    //alert(prov + dire +  loc);
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";
    console.log(punto);
    var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"VerEnMapa"
		}
	});
    funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
        $("#punto").val(punto);
        $("#id").val(id);
	Geolocalizacion.Marcador.iniciar();
	Geolocalizacion.Marcador.verMarcador();	
	});
}*/


