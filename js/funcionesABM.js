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
		var foto = $('img').attr('src');
				foto = foto.split('/');

				var file = $("#foto")[0].files[0];
								
				var img = (file != undefined)? file.name: foto[1];
		
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
			localidad:localidad,
			foto: img 
		}

	});
	funcionAjax.done(function(retorno){
		if($retorno=="esta")
		{
			alert("El nombre de usuario ya existe.")
			Mostrar('mostrarregistro');
		}
		else
		{
			alert("Se registro correctamente!!");
			Mostrar('mostrarlogin');
		}

		$("#informe").html("Gracias por registrarse!!");
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	
}//fin GuardarCliente

function GuardarInvitado()
{
		var user=$("#user").val();
		var dni=$("#dni").val();
		var nomyape=$("#nomyape").val();
		var pariente=$("#pariente").val();
		var nromesa=$("input[name='nromesa']:checked").val();
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarInvitado",
			user:user,
			dni:dni,
			nomyape:nomyape,
			pariente:pariente,
			nromesa:nromesa
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar('mostrarInvitados');
		$("#informe").html("cantidad de agregados "+ retorno);
		$("#informe").html("Se guardo el invitado!");
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}//fin GuardarInvitado


function BorrarInvitado(dniParametro)
{
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarInvitado",
			dni:dniParametro
		}
	});
	funcionAjax.done(function(retorno){
		alert("Se elimino el invitado");
		Mostrar('mostrarInvitados');
		$("#informe").html("cantidad de eliminados "+ retorno);		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}//fin BorrarInvitado

function EditarInvitado(dniParametro)
{
	Mostrar('EditarInvitado');
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerInvitadosDNI",
			dni:dniParametro	
		     }
	});
		
	funcionAjax.done(function(retorno){
		var invitado =JSON.parse(retorno);
		$("#dni").val(invitado.dni);
		$("#nomyape").val(invitado.nomyape);
		$("#pariente").val(invitado.pariente);
		var nromesa = invitado.nromesa;

										if(nromesa=="m1")
										{
											$('input[id=nromesa][value="m1"]').attr('checked', true); 
										}

										if(nromesa=="m2")
										{
											$('input[id=nromesa][value="m2"]').attr('checked', true); 
										}
										if(nromesa=="m3")
										{
											$('input[id=nromesa][value="m3"]').attr('checked', true); 
										}

										if(nromesa=="m4")
										{
											$('input[id=nromesa][value="m4"]').attr('checked', true); 
										}

	//Trae los datos del invitado!!
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);
		alert("error");		
	});	
	
}//fin EditarInvitado 


function ModificarInvitado() 
{
		var dni=$("#dni").val();
		var nomyape=$("#nomyape").val();
		var pariente=$("#pariente").val();
		var nromesa=$("input[name='nromesa']:checked").val();
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"ModificarInvitado",
			dni:dni,
			nomyape:nomyape,
			pariente:pariente,
			nromesa:nromesa
		}
	});
	funcionAjax.done(function(retorno){
		alert("Se modifico el invitado!");
		Mostrar('mostrarInvitados');
		$("#informe").html("Se modifico el invitado: "+ dni);
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}//fin ModificarInvitado