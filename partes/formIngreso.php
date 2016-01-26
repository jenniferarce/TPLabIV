<!--<link href="components/bootstrap-css/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="css/ingreso.css" rel="stylesheet">

<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>  <!-- REVIASR Y ARREGLAR SI ANDA!!!!! -->
    <!--   <div id="formLogin" class="container" align="center">

      <form class="form-ingreso" onsubmit="validarLogin();return false;" style="background-color:transparent;">
        <h2 class="form-ingreso-heading">Ingrese su cuenta</h2>
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

    </div>  /container  -->

    <hr>
      <div class="row" align="center">
            <div id="formLogin" class="col-sm-4"align="center" >

            <form class="form-ingreso" onsubmit="validarLogin();return false;" style="background-color:transparent;">
            <h2 class="form-ingreso-heading">Ingrese su cuenta</h2>
            <input type="text" id="usuario" name="usuario" class="form-control" title="Ingrese su nombre de usuario" placeholder="Usuario" required autofocus>
            <br>
            <input type="password" id="clave" name="clave" class="form-control" title="Ingrese su contraseña" placeholder="Clave" required>
            <br>
              <div class="checkbox">
              <label>
                <input type="checkbox" id="recordarme" checked> Recordame
              </label>
              </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-play"></span>Ingresar</button>
            </form>
            </div> <!-- LOGIN -->
            
            <div id="formRegistro" class="col-sm-4" align="center">
            <!-- REVISAR -->
            <form class="form-ingreso" onsubmit="GuardarCliente();returnfalse;" style="background-color:transparent;"> <!--"validarRegistro();return false;"> -->
            <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
            <label for="usuario" class="sr-only">Usuario</label>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" title="Ingrese su nombre de usuario" required autofocus><br>
            <label for="clave" class="sr-only">Clave</label>
            <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" title="Ingrese su contraseña" required><br>
            <label for="email" class="sr-only">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" title="Ingrese un correo valido" placeholder="example@example.com" required><br>
            <label for="telefono" class="sr-only">Telefono</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Telefono" title="Ingrese su numero de telefono"><br>
            
            <input type="file" name="foto" id="foto">
            <img  class="fotoform" id="foto">
            <p style="  color: black;" > *La foto se actualiza al guardar.</p> <!--VER!!! --> 

            <button class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-asterisk"></span>Registrarme</button>
            </form>
            </div> <!-- REGISTRO -->
          
        </div>
        <!-- /.row -->
        <hr> 

  <?php }else{    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <script type="text/javascript">
 </script>
<?php  

} ?>