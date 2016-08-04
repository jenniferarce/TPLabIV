<!DOCTYPE html> 
<!--<link href="components/bootstrap-css/css/bootstrap.min.css" rel="stylesheet">-->
<link href="css/ingreso.css" rel="stylesheet"> 

<?php 
 
session_start();


if(!isset($_SESSION['registrado'])){  ?>
    <div id="formRegistro" class="container" align="center"> 

      <form class="form-ingreso" action="partes/guardarRegistro.php" style="background-color:transparent;" method="post" enctype="multipart/form-data"> <!--"validarRegistro();return false;"> -->
          <h3 class="form-ingreso-heading">Ingrese sus datos</h3>
            <p style="color:red;">* Datos requeridos</span> <br>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" onblur="blurFunction()" title="Ingrese su nombre de usuario" style="border:1px solid red" required autofocus><br>
            <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" title="Ingrese su contraseña" style="border:1px solid red" required><br>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre y Apellido" title="Ingrese su nombre y apellido" style="border:1px solid red" required><br>
            <input type="email" id="email" name="email" class="form-control" title="Ingrese un correo valido" placeholder="example@example.com" style="border:1px solid red" required><br>
            <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Telefono" title="Ingrese su numero de telefono" style="border:1px solid red" required><br>
              <select id="provincia" name="provincia" class="form-control" title="Seleccione una provincia" optional>
                <option value=null> </option>
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Santa Fe">Santa Fe</option>
              </select> <br>
               <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Calle y numero" title="Ingrese su direccion" optional><br>
              <input type="text" id="localidad" name="localidad" class="form-control" placeholder="Localidad" title="Ingrese la localidad" optional>
              <input readonly   type="hidden"    id="id" class="form-control">

              <br>
            <input type="file" name="foto" id="foto" class="form-control" OPTIONAL>
             <img  src="fotos/<?php echo isset($cliente) ? $cliente->GetFoto() : "pordefecto.png" ; ?>" class="fotoform" id="foto"/>
            <p style="  color: black;" > *La foto se actualiza al guardar.</p> 

            <!-- AGREGADO:: VERIFICAR! -->
            <br>
            <p style="color:red;">* Seleccione el tipo de usuario que desea crear: </p>
            <input type="radio" name="tipo_usuario" <?php if (isset($tipo_usuario) && $tipo_usuario=="cliente") echo "checked";?> value="cliente">Cliente 
            <input type="radio" name="tipo_usuario" <?php if (isset($tipo_usuario) && $tipo_usuario=="admin") echo "checked";?> value="admin">Admin <br>

              <BR>
          <button class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-asterisk"></span>Registrarme</button>
      </form>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="js/funcionesRegistro.js"></script>
    </div>

  <?php }
  else{    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado, no puede registrarse. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <script type="text/javascript">
 </script>
<?php  

} ?>
