<?php

   require_once("php/crudPedido.php");
   require_once("php/crudCliente.php");
   require_once("php/crudEmpleado.php");

   $obj=new Pedido();

   $objC=new Cliente();
   $clientes=$objC->getNombresClientes();
   $objE=new Empleado();
   $empleados=$objE->getNombresEmpleados();


   if(!empty($_POST)){
  		if(isset($_POST["registrarFactura"])){
        $obj->registrarFactura();
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
    <label for="cliente_cedula">Cliente: </label>
    <select class="form-control" id="cliente_cedula" name="cliente_cedula">
      <?php
        for ($i = 0; $i <count($clientes) ; $i++) {
            ?><option value="<?php echo$clientes[$i]['cedula']; ?>" ><?php echo $clientes[$i]['nombre']; ?>-<?php echo$clientes[$i]['cedula']; ?></option><?php
        }
    ?>
      </select>
  </div>
  <div class="form-group">
    <label for="empleadoCajero_cedula">Empleado: </label>
    <select class="form-control" id="empleadoCajero_cedula" name="empleadoCajero_cedula">
      <?php
        for ($i = 0; $i <count($empleados) ; $i++) {
            ?><option value="<?php echo $empleados[$i]['cedula']; ?>" ><?php echo $empleados[$i]['nombre']; ?>-<?php echo $empleados[$i]['cedula']; ?></option><?php
        }
    ?>
      </select>
  </div>

     <button type="submit" name="registrarFactura" class="btn btn-default"> Registrar </button>

</form>
                </div>

                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
    <lin
</html>
