<!--<link href="components/bootstrap-css/css/bootstrap.min.css" rel="stylesheet">-->
<link href="css/ingreso.css" rel="stylesheet"> 

<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formRegistro" class="container" align="center"> <!-- "col-sm-4" -->
            <!-- REVISAR -->
      <form class="form-ingreso" onsubmit="validarRegistro();returnfalse;" style="background-color:transparent;"> <!--"validarRegistro();return false;"> -->
          <h3 class="form-ingreso-heading">Ingrese sus datos</h3>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" title="Ingrese su nombre de usuario" required autofocus><br>
            <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" title="Ingrese su contraseña" required><br>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre y Apellido" title="Ingrese su nombre y apellido" required><br>
            <input type="email" id="email" name="email" class="form-control" title="Ingrese un correo valido" placeholder="example@example.com" required><br>
            <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Telefono" title="Ingrese su numero de telefono"><br>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="guardardir" checked> Ingresar direccion particular
              </label>
              </div>
              <select id="provincia" class="form-control" name="provincia" title="Seleccione una provincia" optional>
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Santa Fe">Santa Fe</option>
              </select> <br>
               <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Calle y numero" title="Ingrese su direccion" optional><br>
              <input type="text" id="localidad" name="localidad" class="form-control" placeholder="Localidad" title="Ingrese la localidad" optional>

              <!-- VER CARGA DE FOTO -->
              <!--
            <input type="file" name="foto" id="foto" OPTIONAL>
            <img  class="fotoform" id="foto">
            <p style="  color: black;" > *La foto se actualiza al guardar.</p>   -->
              <BR>
          <button class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-asterisk"></span>Registrarme</button>
      </form>
    </div>

  <?php }
  else{    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado, no puede registrarse. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <script type="text/javascript">
 </script>
<?php  

} ?>