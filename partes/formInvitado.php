<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<link href="css/ingreso.css" rel="stylesheet">
<?php 
session_start();

if(isset($_SESSION['registrado'])){?>

    <div id="formInvitado" class="container">
      <form name="formInvitado" class="form-ingreso" onsubmit="GuardarInvitado();return false" style="background-color:transparent;" method="post">
        <h2 class="form-ingreso-heading">Datos del invitado</h2>
        <!-- REVISAR-->
        <input type="number" id="dni" name="dni" class="form-control" placeholder="DNI" title="Ingrese DNI sin puntos." min="1000000" max="99999999" required><br>
        <input type="text"  maxlength="20"  id="nomyape" name="nomyape" title="Se necesita un nombre y apellido" placeholder="Nombre y apellido" class="form-control" required autofocus><br>
        <!--<input type="text" maxlength ="30" id="pariente" title="Ingrese su parentezco" placeholder="Parentezco" class="form-control" optional><br>-->
        <select id="pariente" name="pariente" class="form-control" title="Seleccione un parentezco"> 
            <option value="hermano-a" default>Hermano/a</option>
            <option value="padre">Padre</option>
            <option value="madre">Madre</option>
            <option value="primo-a">Primo/a</option>
            <option value="tio-a">Tio/a</option> 
            <option value="cuniado-a">Cuñado/a</option>
            <option value="suegro-a">Suegro/a</option>
            <option value="amigo-a">Amigo/a</option>
            <option value="otro">Otro</option>
        </select><br>
        <input type="radio" name="nromesa" id="nromesa" value="m1" required>Mesa-1
        <input type="radio" name="nromesa" id="nromesa" value="m2" required>Mesa-2
        <input type="radio" name="nromesa" id="nromesa" value="m3" required>Mesa-3
        <input type="radio" name="nromesa" id="nromesa" value="m4" required>Mesa-4<br>
        
        <!-- <input readonly type="hidden" id="id" class="form-control"> -->
        <!-- <input readonly type="hidden" id="id" class="form-control" value="<?php //echo $_SESSION['registrado']; ?>"> -->
        <input readonly type="hidden" id="user" class="form-control" value="<?php echo $_SESSION['registrado']; ?>"><!-- "<?php //echo  intval(cliente::retornoID($_SESSION['registrado'])); ?>"> --> <!--VER-->
        
        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
     
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h4>Para acceder, ingrese a su cuenta. </h4>";?>         
   
  <?php  }  ?>