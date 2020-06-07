<?php

   require_once("php/crudPedido.php");
   require_once("php/crudEmpleado.php");

   $obj=new Pedido();
   $mesas=$obj->getMesasDisponibles();

   $objE=new Empleado();
   $empleados=$objE->getNombresEmpleados();

   if(!empty($_GET)){
     if(isset($_GET["idfactura"])){
       $idfactura=strip_tags($_GET["idfactura"]);

     }
   }
   if(!empty($_POST)){
  		if(isset($_POST["registrarPedido"])){
        $obj->registrarPedido($idfactura);
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
      <label for="idfactura">ID Factura: </label>
      <input type="number" class="form-control" id="idfactura" name="idfactura" value="<?php echo $idfactura; ?>" readonly="true">
    </div>
    <div class="form-group">
    <label for="empleadoMesero_cedula">Empleado: </label>
    <select class="form-control" id="empleadoMesero_cedula" name="empleadoMesero_cedula">
      <?php
        for ($i = 0; $i <count($empleados) ; $i++) {
            ?><option value="<?php echo $empleados[$i]['cedula']; ?>" ><?php echo $empleados[$i]['nombre']; ?>-<?php echo $empleados[$i]['cedula']; ?></option><?php
        }
    ?>
      </select>
  </div>
  <div class="form-group">
  <label for="mesa_idmesa">Mesa: </label>
  <select class="form-control" id="mesa_idmesa" name="mesa_idmesa">
    <?php
      for ($i = 0; $i <count($mesas) ; $i++) {
          ?><option value="<?php echo $mesas[$i]['idmesa']; ?>" ><?php echo $mesas[$i]['idmesa']; ?></option><?php
      }
  ?>
    </select>
  </div>
     <button type="submit" name="registrarPedido" class="btn btn-default"> Registrar </button>

</form>
                </div>

                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
