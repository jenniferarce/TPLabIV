
<!--<link href="components/bootstrap-css/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="css/ingreso.css" rel="stylesheet">

<?php 
 
session_start();
if(!isset($_SESSION['registrado']) ) {  ?>  <!-- REVIASR Y ARREGLAR SI ANDA!!!!! -->
  <div id="formLogin" class="container" align="center">
    <form class="form-ingreso" onsubmit="validarLogin();return false;" style="background-color:transparent;" method="post">
        <h3 class="form-ingreso-heading">Ingrese su cuenta</h3>
        <input type="text" id="usuario" name="usuario" class="form-control" title="Ingrese su nombre de usuario" placeholder="Usuario" value="<?php if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>" required autofocus>
        <br> <!-- value="<?php // if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>" -->
        <input type="password" id="clave" name="clave" class="form-control" title="Ingrese su contraseña" placeholder="Clave" required>
           <div class="checkbox">
           <label>
           <input type="checkbox" id="recordarme" checked> Recordame
           </label>
           </div>
           <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button> <!-- <span class="glyphicon glyphicon-play"></span>-->
    </form>
  </div> 

  <?php }

  else{    
    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>"; ?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <?php  } ?>