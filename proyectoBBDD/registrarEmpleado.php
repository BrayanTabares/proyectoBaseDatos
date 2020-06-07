<?php

   require_once("php/crudEmpleado.php");

   $obj=new Empleado();
   $tipoempleado=$obj->tipoEmpleado;
   if(!empty($_POST)){
  		if(isset($_POST["registrarEmpleado"])){
        $obj->registrarEmpleado();
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
    <input type="number" class="form-control" id="cedula" name="cedula" placeholder="cédula">
  </div>
  <div class="form-group">
    <label for="nombre">Nombre Completo: </label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo">
  </div>
  <div class="form-group">
    <label for="telefono">Teléfono: </label>
    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono celular o fijo">
  </div>
  <div class="form-group">
    <label for="campo">Campo: </label>
    <input type="text" class="form-control" id="campo" name="campo" placeholder="Campo">
  </div>
  <div class="form-group">
    <label for="zona">Zona: </label>
    <input type="text" class="form-control" id="zona" name="zona" placeholder="Zona de trabajo">
  </div>
  <div class="form-group">
    <label for="tipoEmpleado">Tipo de Empleado</label>
    <select class="form-control" id="tipoEmpleado" name="tipoEmpleado">
      <?php
        for ($i = 0; $i <count($tipoempleado) ; $i++) {
            ?><option value="<?php echo $i ?>" ><?php echo $tipoempleado[$i]; ?></option><?php
        }
    ?>
      </select>
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción: </label>
     <textarea class="form-control" id="descripcion" name="descripcion" aria-label="With textarea"></textarea>
  </div>

     <button type="submit" name="registrarEmpleado" class="btn btn-default"> Registrar </button>

</form>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
