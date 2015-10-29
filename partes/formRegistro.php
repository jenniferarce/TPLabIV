<!--<link href="components/bootstrap-css/css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet"> -->

<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formRegistro" class="container">

      <form class="form-ingreso" onsubmit="validarRegistro();return false;">
        <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
          <label for="usuario" class="sr-only">Usuario</label>
          <input type="text" id="usuario" name="usuario" class="form-control" title="Ingrese su nombre de usuario" required autofocus><br>
          <label for="clave" class="sr-only">Clave</label>
          <input type="password" id="clave" name="clave" class="form-control" title="Ingrese su contraseña" required><br>
          <label for="email" class="sr-only">E-mail</label>
          <input type="email" id="email" name="email" title="Ingrese un correo valido" placeholder="example@example.com" required>
          <label for="telefono" class="sr-only">Telefono</label>
          <input type="tel" id="telefono" name="telefono" title="Ingrese su numero de telefono">

          <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado, no puede registrarse. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <script type="text/javascript">
 </script>
<?php  

} ?>