<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<link href="css/ingreso.css" rel="stylesheet">

<?php 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formInvitado" class="container">

      <form class="form-ingreso" onsubmit="GuardarInvitado();return false">
        <h2 class="form-ingreso-heading">Datos del invitado</h2>
        <!-- REVISAR-->
    
        <input type="text"  maxlength="20"  id="nom" title="Se necesita un nombre" plaeholder="Nombre" class="form-control" required autofocus><br>
        <input type="number" id="dni" class="form-control" placeholder="DNI" title="Ingrese DNI sin puntos." min="1000000" max="99999999" required><br>
        <input type="text" maxlength ="30" id="pariente" title="Ingrese su parentezco" placeholder="Parentezco" class="form-control" optional><br>
        <input type="radio" name="nromesa" id="nromesa" value="1" required>Mesa-1
        <input type="radio" name="nromesa" id="nromesa" value="2" required>Mesa-2
        <input type="radio" name="nromesa" id="nromesa" value="3" required>Mesa-3
        <input type="radio" name="nromesa" id="nromesa" value="4" required>Mesa-4<br>
        
        <input readonly   type="hidden"    id="idd" class="form-control">
        <input readonly   type="hidden"    id="id" class="form-control" value="<?php echo $_SESSION['registrado'];?>"> <!--VER-->

        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
     
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>";?>         
   
  <?php  }  ?>