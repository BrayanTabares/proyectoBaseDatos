<?php

   require_once("php/crudEmpleado.php");

   $obj=new Empleado();
   if(!empty($_GET)){
     $cedula=strip_tags($_GET["cedula"]);
     $empleado=$obj->getEmpleadoPorCC($cedula);
  }
   if(!empty($_POST)){
  		if(isset($_POST["actualizarEmpleado"])){
        $obj->actualizarEmpleado();
  		}
    }
?>


<html>
   <head>
	<?php require_once("resources/head.php") ?>
   </head>
         <body>
           <div class="cabez">
            <div id="header">
              <?php require_once("resources/header.php") ?>
            </div>
          </div>
              <div id="principal">
                <div id="content">
                    <form action="#" method="post">
  <div class="form-group">
    <label for="cedula">Cédula: </label>
    <input type="number" class="form-control" id="cedula" name="cedula" value="<?php echo $empleado['cedula']; ?>" readonly="true">
  </div>
  <div class="form-group">
    <label for="nombre">Nombre Completo: </label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado['nombre']; ?>" placeholder="Nombre completo">
  </div>
  <div class="form-group">
    <label for="telefono">Teléfono: </label>
    <input type="text" class="form-control" id="telefono" value="<?php echo $empleado["numero"]; ?>" name="telefono" placeholder="Teléfono celular o fijo">
  </div>
  <div class="form-group">
    <label for="campo">Campo: </label>
    <input type="text" class="form-control" id="campo" name="campo" value="<?php echo $empleado["campo"]; ?>" placeholder="Campo">
  </div>
  <div class="form-group">
    <label for="zona">Zona: </label>
    <input type="text" class="form-control" id="zona" name="zona" value="<?php echo $empleado["zona"]; ?>" placeholder="Zona de trabajo">
  </div>
  <div class="form-group">
    <label for="tipoEmpleado">Tipo de Empleado</label>
    <select class="form-control" id="tipoEmpleado" name="tipoEmpleado">
      <?php
        for ($i = 0; $i <count($obj->tipoEmpleado) ; $i++) {
            ?><option value="<?php echo $i ?>" ><?php echo $obj->tipoEmpleado[$i]; ?></option><?php
        }
    ?>
      </select>
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción: </label>
         <textarea class="form-control" id="descripcion" name="descripcion" aria-label="With textarea"><?php echo $empleado['descripcion']; ?></textarea>
      </div>
  </div>
     <button type="submit" name="actualizarEmpleado" class="btn btn-default"> Registrar </button>

</form>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
