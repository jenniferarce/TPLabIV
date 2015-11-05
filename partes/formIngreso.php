<!--<link href="components/bootstrap-css/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="css/ingreso.css" rel="stylesheet">

<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formLogin" class="container">

      <form class="form-ingreso" onsubmit="validarLogin();return false;">
        <h2 class="form-ingreso-heading">Ingrese su cuenta</h2>
          <!--<label for="usuario" class="sr-only">Usuario</label>-->
          <input type="text" id="usuario" name="usuario" class="form-control" title="Ingrese su nombre de usuario" placeholder="Usuario" required autofocus>
          <br>
          <input type="password" id="clave" name="clave" class="form-control" title="Ingrese su contraseña" placeholder="Clave" required>
          <br>
       <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordame
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <script type="text/javascript">
 </script>
<?php  

} ?>