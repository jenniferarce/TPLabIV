function GuardarCliente()
{
		var id=$("#id").val();
		var usuario=$("#usuario").val();
		var clave=$("#clave").val();
		var nombre=$("#nombre").val();
		var telefono=$("#telefono").val();
		var email=$("#email").val();
		var provincia=$("#provincia").val();
		var direccion=$("#direccion").val();
		var localidad=$("#localidad").val();
		
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarCliente",
			id:id,
			usuario:usuario,
			clave:clave,
			nombre:nombre,
			telefono:telefono,
			email:email,
			provincia:provincia,
			direccion:direccion,
			localidad:localidad
		}

	});
	funcionAjax.done(function(retorno){
		alert("Se registro correctamente!!");
		Mostrar('mostrarlogin');
		//$("#informe").html("cantidad de agregados "+ retorno);
		$("#informe").html("Gracias por registrarse!!");
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	
}//fin GuardarCliente

function GuardarInvitado() //VALIDAR EXISTENCIA
{
		//HACER CAMBIOS!!!
		var idd=$("#idd").val();
		var id=$("#id").val();//de cliente
		var nom=$("#nom").val();
		var dni=$("#dni").val();
		var pariente=$("#pariente").val();
		var nromesa=$("input[name='nromesa']:checked").val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarInvitado",
			idd:idd,
			id:id,
			nom:nom,
			dni:dni,
			localidad:localidad,
			direccion:direccion,
			pariente:pariente,
			nromesa:nromesa
		}
	});
	funcionAjax.done(function(retorno){
		alert("Se guardo el invitado");
		Mostrar('mostrarInvitados');
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
		Mostrar('mostrarInvitados');
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
		$("#idd").val(invitado.idd);
		$("#nom").val(invitado.nom);
		$("#dni").val(invitado.dni);
		$("#provincia").val(invitado.provincia)
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
										}
										if(nromesa=="Mesa-3")
										{
											$('input[id=nromesa][value="3"]').attr('checked', true); 
										}

										if(nromesa=="Mesa-4")
										{
											$('input[id=nromesa][value="4"]').attr('checked', true); 
										}
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);
		alert("error");		
	});	
	
}//fin EditarInvitado