<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<?php 
session_start();
if(isset($_SESSION['registrado'])){  ?>
    <div id="formInvitado" class="container">

      <form class="form-ingreso" onsubmit="GuardarInvitado();return false">
        <h2 class="form-ingreso-heading">Datos del invitado</h2>
        <!-- HACER CAMBIOS -->
        <input type="text"  maxlength="20"  id="provincia" title="Se necesita un nombre de provincia" class="form-control" placeholder="Provincia" required autofocus>
           <input type="text"  maxlength="50"  id="localidad" title="Se necesita un nombre de localidad" class="form-control" placeholder="Localidad">
          <input type="text"  maxlength="50"  id="direccion" title="Se necesita una direccion" class="form-control" placeholder="Direccion">
        <select name="candidato" id="candidato" class="form-control">
          <option selected value="Macri">Macri</option>
          <option value="Massa">Massa</option>
          <option value="Scioli">Scioli</option>
        </select><br>

        <input type="radio" name="sexo" id="sexo" value="Masculino" required>Masculino
        <input type="radio" name="sexo" id="sexo" value="Femenino" required>Femenino<br>

        <input readonly   type="hidden"    id="id" class="form-control" >
        <input readonly   type="hidden"    id="dni" class="form-control" value="<?php echo $_SESSION['registrado'];?>">

        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
     
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>";?>         
   
  <?php  }  ?>