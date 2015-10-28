<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formLogin" class="container">

      <form  class="form-ingreso " onsubmit="validarCliente();return false;">
        <h2 class="form-ingreso-heading">Ingrese su cuenta</h2>
          <!--<label for="usuario" class="sr-only">Usuario</label>-->
          <input type="text" id="usuario" name="usuario" class="form-control" title="Ingrese su nombre de usuario" required autofocus>
          <input type="password" id="clave" name="clave" class="form-control" title="Ingrese su contraseña" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <script type="text/javascript">
 </script>
<?php  

}  ?>
    
  


